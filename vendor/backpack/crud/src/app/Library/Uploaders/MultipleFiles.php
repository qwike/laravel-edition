<?php

namespace Backpack\CRUD\app\Library\Uploaders;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Uploaders\Support\Interfaces\UploaderInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class MultipleFiles extends Uploader
{
    public static function for(array $field, $configuration): UploaderInterface
    {
        return (new self($field, $configuration))->multiple();
    }

    public function uploadFiles(Model $entry, $value = null)
    {
        $filesToDelete = CRUD::getRequest()->get('clear_'.$this->getName());
        $value = $value ?? CRUD::getRequest()->file($this->getName());
        $previousFiles = $this->getPreviousFiles($entry) ?? [];

        if (! is_array($previousFiles) && is_string($previousFiles)) {
            $previousFiles = json_decode($previousFiles, true);
        }

        if ($filesToDelete) {
            foreach ($previousFiles as $previousFile) {
                if (in_array($previousFile, $filesToDelete)) {
                    Storage::disk($this->getDisk())->delete($previousFile);

                    $previousFiles = Arr::where($previousFiles, function ($value, $key) use ($previousFile) {
                        return $value != $previousFile;
                    });
                }
            }
        }

        foreach ($value ?? [] as $file) {
            if ($file && is_file($file)) {
                $fileName = $this->getFileName($file);
                $file->storeAs($this->getPath(), $fileName, $this->getDisk());
                $previousFiles[] = $this->getPath().$fileName;
            }
        }

        return isset($entry->getCasts()[$this->getName()]) ? $previousFiles : json_encode($previousFiles);
    }

    public function uploadRepeatableFiles($files, $previousRepeatableValues, $entry = null)
    {
        $fileOrder = $this->getFileOrderFromRequest();

        foreach ($files as $row => $files) {
            foreach ($files ?? [] as $file) {
                if ($file && is_file($file)) {
                    $fileName = $this->getFileName($file);
                    $file->storeAs($this->getPath(), $fileName, $this->getDisk());
                    $fileOrder[$row][] = $this->getPath().$fileName;
                }
            }
        }

        foreach ($previousRepeatableValues as $previousRow => $previousFiles) {
            foreach ($previousFiles ?? [] as $key => $file) {
                $key = array_search($file, $fileOrder, true);
                if ($key === false) {
                    Storage::disk($this->getDisk())->delete($file);
                }
            }
        }

        return $fileOrder;
    }
}
