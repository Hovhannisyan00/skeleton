@php
    $replacedName = replacedFormElementName($name);
    $title = __('__dashboard.label.'.($title ?? $replacedName));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp
<div class="custom-checkbox mb-2">
    <input type="checkbox"
           id="{{$labelId}}"
           @isset($readonly) readonly @endisset
           @isset($disabled) disabled @endisset
           @if(isset($checked) && $checked) checked @endif
           name="{{ $name ?? '' }}"
           value="{{ $value ?? '1' }}"
           class="form-check-input {{ $class ?? '' }}"
    >
    <label for="{{ $labelId }}" class="control-label checkbox-label">{{ $title }}</label>
</div>
<x-dashboard.form._error :name="$replacedName"></x-dashboard.form._error>

