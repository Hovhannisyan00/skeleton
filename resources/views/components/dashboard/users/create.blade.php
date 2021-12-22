<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>
            <div class="card-body">
                <x-dashboard.form._form
                    :action="route('dashboard.users.store')"
                    method="post"
                    :indexUrl="route('dashboard.users.index')"
                >
                    <x-dashboard.users.form :roles="$roles"/>
                </x-dashboard.form._form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/users/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>


