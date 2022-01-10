@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.($title ?? $name));
@endphp
<label for="{{ $name }}.{{ $randomNum }}" class="control-label">{{ $title }}</label>
<textarea
       id="{{empty($id) ? $name.'_'.$randomNum : $id}}"
       @isset($autocomplete) autocomplete="off" @endisset
       @isset($readonly) readonly @endisset
       placeholder="{{ $title }}"
       name="{{ $name ?? '' }}"
       class="form-control {{ $class ?? '' }}"
       cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}"
>{{ $value ?? '' }}</textarea>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
