@php
    $title = __('__dashboard.label.'.($title ?? $name));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp
<div class="custom-radio-block mb-2">
    <input type="radio"
           id="{{$labelId}}"
           @isset($readonly) readonly @endisset
           @isset($disabled) disabled @endisset
           @if(isset($checked) && $checked) checked @endif
           name="{{ $name ?? '' }}"
           value="{{ $value ?? '' }}"
           class="custom-radio {{ $class ?? '' }}"
    >
    <label for="{{ $labelId }}" class="form-check-label">{{ $title }}</label>
</div>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>

