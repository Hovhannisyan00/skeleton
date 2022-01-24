@php
    $title = __('__dashboard.label.'.($title ?? $name));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
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
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
