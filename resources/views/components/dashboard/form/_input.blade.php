@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.($title ?? $name));
@endphp
<label for="{{ $name }}_{{ $randomNum }}" class="control-label">{{ $title }}</label>
<input type="{{ $type ?? 'text' }}"
       id="{{empty($id) ? $name.'_'.$randomNum : $id}}"
       @isset($autocomplete) autocomplete="off" @endisset
       @isset($readonly) readonly @endisset
       @isset($disabled) disabled @endisset
       placeholder="{{ $title }}"
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
