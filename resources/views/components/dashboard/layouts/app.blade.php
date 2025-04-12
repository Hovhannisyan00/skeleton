<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    {{-- Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    {{-- Custom styles --}}
    <link href="{{ asset('/css/dashboard/datatable.css') }}" rel="stylesheet">

    {{-- Laravel routes for JS --}}
    @routes

    {{-- Vite build --}}
    @vite(['resources/sass/dashboard/dashboard-app.scss', 'resources/js/dashboard/dashboard-app.js'])

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-..." crossorigin="anonymous"/>

    {{ $head ?? '' }}

    {{-- Data for JS --}}
    <x-dashboard.layouts.partials.data-for-js/>
</head>
<body>

<main class="d-flex page">
    <x-dashboard.layouts.partials.sidebar />

    <div class="wrapper w-100 d-flex flex-column">
        <x-dashboard.layouts.partials.header />
        <div class="content d-flex flex-column flex-column-fluid">
            <x-dashboard.layouts.partials.subheader />
            {{ $slot ?? '' }}
        </div>
    </div>
</main>

<x-dashboard.partials.modals />

{{-- Core Js  --}}
{{--<script src="{{ mix('/js/dashboard/dashboard-app.js') }}"></script>--}}
{{--<script src="{{ mix('/js/dashboard/bundle.js') }}"></script>--}}


{{ $scripts ?? '' }}

</body>
</html>
