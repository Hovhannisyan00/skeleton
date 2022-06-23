<button class="btn {{ $type ?? 'btn-primary' }} {{ $class ?? 'search__form__btn' }}" @if(!empty($disabled)) disabled @endif>
    {{ __('__dashboard.button.'.($text ?? 'search')) }}
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</button>
