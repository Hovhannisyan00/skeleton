@php
    $replacedName = replaceNameWithDots($name);
    $title = __('__dashboard.label.'.($title ?? $replacedName));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp

@if(!isset($noLabel))
<label for="{{ $labelId }}" class="control-label">{{ $title }}</label>
@endif

<input type="{{ $type ?? 'text' }}"
       id="{{$labelId}}"
       @isset($autocomplete) autocomplete="off" @endisset
       @if(!empty($readonly)) readonly @endif
       @if(!empty($disabled)) disabled @endif
       @if(!isset($noPlaceholder))
       placeholder="{{ $title }}"
       @endif
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$replacedName"></x-dashboard.form._error>
