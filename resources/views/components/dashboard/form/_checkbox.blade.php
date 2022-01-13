@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.($title ?? $name));
@endphp
<div class="custom-checkbox mb-2">
<input type="checkbox"
       id="{{empty($id) ? $name.'_'.$randomNum : $id}}"
       @isset($readonly) readonly @endisset
       @isset($disabled) disabled @endisset
       @if(isset($checked) && $checked) checked @endif
       name="{{ $name ?? '' }}"
       value="{{ $value ?? '1' }}"
       class="form-check-input {{ $class ?? '' }}"
>
<label for="{{ $name }}_{{ $randomNum }}" class="control-label checkbox-label">{{ $title }}</label>
</div>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>

