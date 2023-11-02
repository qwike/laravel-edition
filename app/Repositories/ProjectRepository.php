<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository
{
    public function getMainProjects(): Collection
    {
        return Project::query()->orderBy('created_at', 'DESC')->limit(2)->get();
    }
}
