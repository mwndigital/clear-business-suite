<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@stack('page-title') - {{ config('app.name', 'Laravel') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/sitewide.js') }}"></script>
        <script src="{{ asset('assets/js/admin.js') }}"></script>

        @stack('page-scripts')
        @stack('page-styles')

        <x-head.tinymce-config/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <x-application-logo/>
                    </a>
                    <button class="navbar-toggler" type="button" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @include('admin.layouts.partials.menus.topbarMainMenu')
                        @include('admin.layouts.partials.menus.topbarSecondryMenu')
                    </div>
                </div>
            </nav>
        </header>
        @include('sweetalert::alert')
        <div id="app">
            <main>
