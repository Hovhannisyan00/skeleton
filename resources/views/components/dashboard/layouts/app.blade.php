<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Core</title>

    {{-- Styles  --}}
    {{ $head ?? '' }}

    <link href="{{ asset('/css/dashboard/datatable.css') }}" rel="stylesheet">
    <link href="{{mix('/css/dashboard/dashboard-app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{-- Data for Js files  --}}
    <script>
        // JS get route by route name
        const routesData = @json(getAllRoutesName());

        // Dates Format
        window.$dashboardDates = @json(getDashboardDates());

        // JS Translation
        window.trans = @json(getTrans());

        // Roles
        window.$app = {
            roles: @json(getAuthUserRolesName()),
            permissions: []
        }
    </script>
    <script src="{{ asset('js/dashboard/dashboard-init.js') }}"></script>
</head>
<body>

<main class="d-flex page">
    <x-dashboard.layouts.partials.sidebar></x-dashboard.layouts.partials.sidebar>

    <div class="wrapper w-100 d-flex flex-column">
        <x-dashboard.layouts.partials.header></x-dashboard.layouts.partials.header>
        <div class="content d-flex flex-column flex-column-fluid">
            <x-dashboard.layouts.partials.subheader></x-dashboard.layouts.partials.subheader>
            {{ $slot ?? '' }}
        </div>
    </div>
</main>

<x-dashboard.partials.modals></x-dashboard.partials.modals>

<script src="{{ mix('/js/dashboard/main/dashboard-app.js') }}"></script>
<script src="{{ asset('/js/dashboard/ckeditor.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>

{{-- Core Js  --}}
<script src="{{ mix('/js/dashboard/main/global-scripts.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/ConfirmModal.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/FormRequest.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/FileUploader.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/MultipleInputs.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/Modal.js') }}"></script>

{{-- Index pages add Datatable Js  --}}
@if(isset($isIndexPage))
<script src="{{ asset('/js/dashboard/core/DataTable.js') }}"></script>
@endif

{{ $scripts ?? '' }}

</body>
</html>
