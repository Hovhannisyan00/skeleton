<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>
            <div class="card-body">
                <x-dashboard.form._form
                    :action="route('dashboard.articles.store')"
                    :indexUrl="route('dashboard.articles.index')"
                    method="post"
                    hasShowStatus
                >
                    <x-dashboard.articles.form/>
                </x-dashboard.form._form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/articles/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>


