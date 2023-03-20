<div class="card-header">
    <div class="card-title">
        @isset($title)
            <h3 class="card-label">{{ $title }}</h3>
        @endisset
    </div>

    @isset($createRoute)
        @php
            $pageName = isset($addPageName) ? '.'.$subHeaderData['pageName'] : '';
        @endphp
        <div class="ml-auto">
            <a href="{{ $createRoute }}" class="btn btn-create">
                <i class="flaticon2-plus mr-2"></i>
                {{ __("__dashboard$pageName.button.create") }}
            </a>
        </div>
    @endisset
</div>
