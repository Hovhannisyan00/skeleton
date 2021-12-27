@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.($title ?? str_replace('[]', '',$name)));
@endphp
<label for="{{ $name }}.{{ $randomNum }}" class="control-label">{{ $title }}</label>
<select name="{{ $name }}"
        id="{{ $name }}.{{$randomNum}}"
        class="form-control {{ $class ?? '' }}"
        @isset($multiple) multiple @endisset
        @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
>

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
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>

