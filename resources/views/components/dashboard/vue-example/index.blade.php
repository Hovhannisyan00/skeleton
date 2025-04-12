<x-dashboard.layouts.app>
    <x-slot name="scripts">
        @routes
        @vite(['resources/js/dashboard/dashboard-app-vue.js'])
    </x-slot>

    <div class="container-fluid">
        <div id="app">
            <vue-example/>
        </div>
    </div>
</x-dashboard.layouts.app>




