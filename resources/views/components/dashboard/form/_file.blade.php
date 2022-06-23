@php
    $replacedName = replacedFormElementName($name);
    $title = __('__dashboard.label.'.($title ?? $replacedName));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp

@if(!isset($noLabel))
    <label for="{{ $labelId }}" class="control-label">{{ $title }}</label>
@endif

<input type="file"
       id="{{$labelId}}"
       @if(!empty($readonly)) readonly @endif
       @if(!empty($disabled)) disabled @endif
       @isset($multiple) multiple @endisset
       name="{{ $name ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$replacedName"></x-dashboard.form._error>
