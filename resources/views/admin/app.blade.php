<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    @livewireStyles


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('scripts')
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">


    @role('admin')
    @include('admin.header')
    @endrole

    @role('driver')
    @include('driver.header')
    @endrole

    @role('customer')
    @include('customer.header')
    @endrole

    @yield('content')

    @stack('modals')

    @livewireScripts
</body>

</html>
