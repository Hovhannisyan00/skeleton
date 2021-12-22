@php
    $randomNum = rand();
    $title = __('__dashboard.label.'.(str_replace('[]', '', $title ?? $name)));
@endphp
<label for="{{ $title }}.{{ $randomNum }}">{{ $title }}</label>
<div class="file__uploader__box">
    <span class="input-group-btn">
    <label for="{{$name}}.{{ $randomNum }}" data-input="{{$name}}_thumbnail" data-preview="{{$name}}_holder"
           class="btn btn-primary text-white">
        <i class="flaticon2-photo-camera" style="color: #fff"></i> {{__('Choose')}} {{ $title }}</label>
    </span>
    <input id="{{$name}}.{{ $randomNum }}" class="form-control d-none"
           type="file" name="{{$name}}"
           @isset($multiple) multiple @endisset
    >
    <br>
    <x-dashboard.form._error :name="$name"></x-dashboard.form._error>

    <div class="d-flex justify-content-start flex-wrap __file__list"></div>
    @if(isset($value) && $value)
        <x-dashboard.form._files_show :value="$value ?? ''"
                                      :multiple="$multiple ?? null"
                                      fieldName="str_replace('[]', '', str_replace('_', ' ', $name))"
        />
    @endif
</div>
