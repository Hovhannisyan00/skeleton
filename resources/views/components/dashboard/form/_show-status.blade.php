@php
    $name = 'show_status';
    $randomNum = rand();
    $title = __('__dashboard.label.'.$name);
@endphp
<label for="{{ $name }}_{{ $randomNum }}" class="control-label">{{ $title }}</label>
<select name="{{ $name }}"
        id="{{empty($id) ? $name.'_'.$randomNum : $id}}"
        class="form-control {{ $class ?? '' }}"
>
    @if(isset($defaultOption))
        <option value="">{{ __('__dashboard.select.option.all') }}</option>
    @endif
    @foreach(\App\Models\Base\BaseModel::SHOW_STATUSES_FOR_SELECT as $item)
        <option value="{{ $item }}"
                @if(isset($value) && $item == $value) selected @endif
        >
            {{ __('__dashboard.select.option.show_status_'.$item) }}
        </option>
    @endforeach
</select>
<x-dashboard.form._error :name="$name"></x-dashboard.form._error>

