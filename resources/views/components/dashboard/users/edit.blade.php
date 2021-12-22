<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <x-dashboard.layouts.partials.card-header/>
            <div class="card-body">
                <x-dashboard.form._form
                    :action="route('dashboard.users.update', $user->id)"
                    method="PUT"
                    :indexUrl="route('dashboard.users.index')"
                >
                    @include('components.dashboard.users.form')
                </x-dashboard.form._form>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="{{ asset('/js/dashboard/users/main.js') }}"></script>
    </x-slot>
</x-dashboard.layouts.app>


