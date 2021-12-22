@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.($title ?? $name));
@endphp
<label for="{{ $name }}.{{ $randomNum }}">{{ $title }}</label>
<textarea
       id="@isset($id){{ $id }}@else{{ $name }}.{{ $randomNum }}@endisset"
       @isset($autocomplete) autocomplete="off" @endisset
       @isset($readonly) readonly @endisset
       placeholder="{{ $title }}"
       name="{{ $name ?? '' }}"
       class="form-control {{ $class ?? '' }}"
       cols="{{ $cols ?? 30 }}" rows="{{ $rows ?? 10 }}"
>{{ $value ?? '' }}</textarea>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
