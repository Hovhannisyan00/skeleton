<form action="{{ $action ?? '' }}" method="{{ $method ?? 'post'}}" id="{{ $id ?? '__form__request' }}">
    @method($method ?? 'post')
    @csrf

    {{ $slot }}
    @isset($hasShowStatus)
       <div class="row">
          <div class="col-lg-6">
              <x-dashboard.form._show-status
                  class="mb-4"
                  :value="$showStatus ?? ''"
              />
          </div>
       </div>
    @endisset

    <div class="d-flex justify-content-end ml-auto form-bottom-buttons">
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
