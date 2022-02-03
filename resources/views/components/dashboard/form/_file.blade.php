@php
    $title = __('__dashboard.label.'.($title ?? $name));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp

@if(!isset($noLabel))
    <label for="{{ $labelId }}" class="control-label">{{ $title }}</label>
@endif

<input type="file"
       id="{{$labelId}}"
       @isset($readonly) readonly @endisset
       @isset($disabled) disabled @endisset
       @isset($multiple) multiple @endisset
       name="{{ $name ?? '' }}"
       class="form-control standard {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
