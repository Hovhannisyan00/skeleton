<div class="card-header">
    <div class="card-title">
        <h3 class="card-label">{{ __('__dashboard.'.$sub_header_data['pageName'].'.title') }}</h3>
    </div>

    @isset($createRoute)
    <div class="ml-auto">
        <a href="{{ $createRoute }}" class="btn btn-create">
            <i class="flaticon2-plus mr-2"></i>
            {{ __('__dashboard.'.$sub_header_data['pageName'].'.create') }}
        </a>
    </div>
    @endisset
</div>
