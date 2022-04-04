<form action="{{ $action ?? '' }}" method="{{ $method ?? 'post'}}" id="{{ $id ?? '__form__request' }}" @if($viewMode == 'show') class="show-mode" @endif>

<div class="card-header">
    <div class="d-flex justify-content-end ml-auto form-bottom-buttons">
        @if(!isset($hideCancelBtn))
        <a href="{{ $indexUrl }}" class="btn btn-secondary ml-2">{{ __('__dashboard.button.cancel') }}</a>
        @endif

        @if($viewMode != 'show')
        <x-dashboard.form._loader_btn
            class="form__request__send__btn ml-2"
            text="{{ $textBtn ?? 'save' }}"
        />
        @endif
    </div>
</div>

<div class="card-body loading-content">
    @method($method ?? 'post')
    @csrf

    {{ $slot }}
    @isset($showStatus)
       <div class="row">
          <div class="col-lg-6">
              <div class="form-group">
                  <x-dashboard.form._show-status
                      class="mb-4"
                      :value="$showStatus ?? ''"
                  />
              </div>
          </div>
       </div>
    @endisset
</div>

<div class="card-footer">
    <div class="d-flex justify-content-end ml-auto form-bottom-buttons">
        @isset($footer)
            {{ $footer }}
        @else
            @if(!isset($hideCancelBtn))
            <a href="{{ $indexUrl }}" class="btn btn-secondary ml-2">{{ __('__dashboard.button.cancel') }}</a>
            @endif

            @if($viewMode != 'show')
            <x-dashboard.form._loader_btn
                class="form__request__send__btn ml-2"
                text="{{ $textBtn ?? 'save' }}"
            />
           @endif
        @endisset
    </div>
</div>

</form>
