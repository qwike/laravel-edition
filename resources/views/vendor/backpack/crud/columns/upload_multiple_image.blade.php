@php
    $column['value'] = $column['value'] ?? data_get($entry, $column['name']);
    $column['prefix'] = $column['prefix'] ?? '';
    $column['suffix'] = $column['suffix'] ?? '';
    $column['disk'] = $column['disk'] ?? null;
    $column['wrapper']['element'] = $column['wrapper']['element'] ?? 'a';
    $column['wrapper']['target'] = $column['wrapper']['target'] ?? '_blank';
    $column['height'] = $column['height'] ?? "auto";
    $column['width'] = $column['width'] ?? "200px";
    $column_wrapper_href = $column['wrapper']['href'] ??
    function($file_path, $disk, $prefix) use ($column) {
        if (is_null($disk)) {
            return $prefix.$file_path;
        }
        if (isset($column['temporary'])) {
            return asset(\Storage::disk($disk)->temporaryUrl($file_path, Carbon\Carbon::now()->addMinutes($column['temporary'])));
        }
        return asset(\Storage::disk($disk)->url($file_path));
    };

    if($column['value'] instanceof \Closure) {
        $column['value'] = $column['value']($entry);
    }
@endphp

<span>
    @if ($column['value'] && count($column['value']))
        @foreach ($column['value'] as $file_path)
            @php
                $href = $column_wrapper_href instanceof \Closure ? $column_wrapper_href($file_path, $column['disk'], $column['prefix']) : $column_wrapper_href;
                $column['wrapper']['href'] = $href;
            @endphp
            @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
                <img width="{{$column['width']}}" src="{{$href}}" alt="Изображение" style="border-radius: 3px; max-height: 200px; margin: 5px;">
            @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')
        @endforeach
    @else
        {{ $column['default'] ?? '-' }}
    @endif
</span>
