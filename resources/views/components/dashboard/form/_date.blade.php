@php
    $title = __('__dashboard.label.'.($title ?? $name));
    $labelId = empty($id) ? $name.'_'.rand() : $id;
    $dateTime = empty($dateTime) ? false : true;

    if($dateTime){
        $backendValue = formatDateTimeForBackend($value ?? '');
    }else{
        $backendValue = formatDateForBackend($value ?? '');
    }
@endphp

@if(!isset($noLabel))
    <label for="{{ $labelId }}" class="control-label">{{ $title }}</label>
@endif

<input type="text"
       id="{{$labelId}}"
       autocomplete="off"
       @isset($readonly) readonly @endisset
       @isset($disabled) disabled @endisset
       @if(!isset($noPlaceholder))
       placeholder="{{ $title }}"
       @endif

       value="{{ $value ?? '' }}"
       class="form-control {{ $class ?? '' }}"
>
<input type="hidden" class="backend-date-value" name="{{ $name ?? '' }}" value="{{ $backendValue }}"></input>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>
