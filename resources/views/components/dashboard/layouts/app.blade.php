<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Core</title>
    {{ $css ?? '' }}
    <link href="{{ asset('/css/dashboard/datatable.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('/css/dashboard/styles.css') }}" rel="stylesheet">--}}
    <link href="{{mix('/css/dashboard/dashboard-app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script>
        // JS get route by route name
        window.route = (name, params = null) => {
            const routesData = @json(getAllRoutesName());
            const route = routesData[name];
            let uri = routesData[name].uri.toString();

            route.parameters.map((item, index) => {
                if (Array.isArray(params)) {
                    uri = uri.replace(`{${item}}`, params[index])
                } else {
                    uri = uri.replace(`{${item}}`, params);
                }
            });
            return location.origin + '/' + uri;
        };

        // Dates Format
        window.$dashboardDates = @json(getDashboardDates());

        // JS Translation
        window.trans = <?php
        // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
        $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
        $trans = [];
        foreach ($lang_files as $f) {
            $filename = pathinfo($f)['filename'];
            if (pathinfo($f)['filename'] == '__dashboard') {
                $trans[$filename] = trans($filename);
            }
        }
        echo json_encode($trans);
        ?>;
    </script>
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
{{--<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>--}}
<script src="{{ asset('/js/dashboard/ckeditor.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script src="{{ mix('/js/dashboard/main/global-scripts.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/ConfirmModal.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/FormRequest.js') }}"></script>
<script src="{{ asset('/js/dashboard/core/FileUploader.js') }}"></script>

{{ $scripts ?? '' }}

</body>
</html>
