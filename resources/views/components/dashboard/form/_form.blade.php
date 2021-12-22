<form action="{{ $action ?? '' }}" method="{{ $method ?? 'post'}}" id="{{ $id ?? '__form__request' }}">
    @method($method ?? 'post')
    @csrf

    {{ $slot }}
    @isset($hasShowStatus)
    <div class="custom-control custom-switch form-group">
        <input type="checkbox" name="show_status" class="custom-control-input" checked value="1" id="__show__status">
        <label class="custom-control-label __show__status_label" for="__show__status">
            <span>Toggle this switch element</span>
        </label>
    </div>
    @endisset

    <div class="d-flex justify-content-end ml-auto">
        @isset($footer)
            {{ $footer }}
        @else
            <a href="{{ $indexUrl }}" class="btn btn-secondary ml-2">{{ __('__dashboard.button.cancel') }}</a>
            <x-dashboard.form._loader_btn
                class="form__request__send__btn ml-2"
                text="{{ $textBtn ?? 'save' }}"
            />
        @endisset
    </div>
</form>
