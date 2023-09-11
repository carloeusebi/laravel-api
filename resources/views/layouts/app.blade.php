<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.css'
        integrity='sha512-Z0kTB03S7BU+JFU0nw9mjSBcRnZm2Bvm0tzOX9/OuOuz01XQfOpa0w/N9u6Jf2f1OAdegdIPWZ9nIZZ+keEvBw=='
        crossorigin='anonymous' />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <style>
        body {
            display: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="container pt-5 vh-100 ">


            <x-navbar></x-navbar>
            <x-modal></x-modal>

            <main class="pt-5 d-flex flex-column h-100 ">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
