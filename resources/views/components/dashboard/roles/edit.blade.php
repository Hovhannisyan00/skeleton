<x-dashboard.layouts.app>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ $subHeaderData['pageName'] ?? '' }}</h3>
                </div>
            </div>
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
        <script>
            new FormRequest();
            $('.select2').select2();
        </script>
    </x-slot>
</x-dashboard.layouts.app>


