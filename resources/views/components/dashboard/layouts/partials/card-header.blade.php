<div class="card-header">
    <div class="card-title">
        <h3 class="card-label">{{ isset($subHeaderData['pageName']) ? __('__dashboard.'.$subHeaderData['pageName'].'.title') : __('__dashboard.title')  }}</h3>
    </div>

    @isset($createRoute)
    <div class="ml-auto">
        <a href="{{ $createRoute }}" class="btn btn-create">
            <i class="flaticon2-plus mr-2"></i>
            {{ __('__dashboard.'.$subHeaderData['pageName'].'.create') }}
        </a>
    </div>
    @endisset
</div>
