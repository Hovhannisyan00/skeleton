@php
    $title = __('__dashboard.label.'.($title ?? $name));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp
<label for="{{$labelId}}" class="control-label">{{ $title }}</label>
<textarea
       id="{{$labelId}}"
       @isset($autocomplete) autocomplete="off" @endisset
       @isset($readonly) readonly @endisset
       placeholder="{{ $title }}"
       name="{{ $name ?? '' }}"
       class="form-control {{ $class ?? '' }}"
       cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}"
>{{ $value ?? '' }}</textarea>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
