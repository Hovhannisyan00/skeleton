@php
    $replacedName = replacedFormElementName($name);
    $title = __('__dashboard.label.'.($title ?? $replacedName));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
@endphp
<label for="{{$labelId}}" class="control-label">{{ $title }}</label>
<select name="{{ $name }}"
        id="{{$labelId}}"
        class="form-control {{ $class ?? '' }}"
        @isset($multiple) multiple @endisset
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
        @isset($allowClear) data-allow-clear="true" @endisset
>

    @if(isset($defaultOption))
        <option value=""> {{ __('__dashboard.select.option.default') }}</option>
    @endif
    @foreach($data as $key => $item)
        <option value="{{ $key }}"
                @isset($value)
                @if(is_array($value) && in_array($key, $value))
                selected
                @else
                @if($key == $value) selected @endif
            @endif
            @endisset
        >
            {{ $item }}
        </option>
    @endforeach
</select>
<x-dashboard.form._error :name="$replacedName"></x-dashboard.form._error>

