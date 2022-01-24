@php
    $dotName = getArrayNameDot($name);
    $title = __('__dashboard.label.'.($title ?? $dotName));

    $labelId = empty($id) ? $title.'.'.rand() : $id
@endphp

@if(!isset($noLabel))
    <label for="{{ $labelId }}" class="control-label">{{ $title }}</label>
@endif
<input type="{{ $type ?? 'text' }}"
       id="{{$labelId}}"
       @isset($autocomplete) autocomplete="off" @endisset
       @isset($readonly) readonly @endisset
       @isset($disabled) disabled @endisset
       @if(!isset($noPlaceholder))
       placeholder="{{ $title }}"
       @endif
       @isset($dataName)
       data-name="{{$dataName}}"
       @endisset
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$dotName"></x-dashboard.form._error>
