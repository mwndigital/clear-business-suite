<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>@stack('page-title') - {{ config('app.name') }}</title>

            <!-- Fonts -->

            <!-- Stylesheets -->
            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

            <!-- Scripts -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>
        </head>
        <body>
            <header>
                @include('admin.layouts.partials.mainNavs.topbarNav')
            </header>
            @include('sweetalert::alert')
