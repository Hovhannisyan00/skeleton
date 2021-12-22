<button class="btn {{ $type ?? 'btn-primary' }} {{ $class ?? 'search__form__btn' }}">
    {{ __('__dashboard.button.'.($text ?? 'search')) }}
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</button>
