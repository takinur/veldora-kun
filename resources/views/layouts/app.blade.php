<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Courier in Moscow -Fast, Relaiable delivery Service' }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Overwrite bootstrap style -->
    <link href="{{ asset('assets/css/bootsnav.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/overwrite.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="{{ asset('assets/fonts/opensans/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons -->
    <link href="{{ asset('assets/fonts/FontAwesome/font-awesome.css') }}" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Skins style -->
    <link id="skin" href="{{ asset('assets/skins/default.css') }}" rel="stylesheet">
    <!--AOS-->
    <link rel="stylesheet" href="{{ asset('assets/aos/aos.css') }}" />



    @yield('scripts')

    @livewireStyles


</head>

<body class="font-sans antialiased ">

    <x-header></x-header>

    @yield('content')

    <x-footer></x-footer>

    <!-- assets JS Files -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootsnav/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/js/column/bootstrap-grid-columns.js') }}"></script>
    <script src="{{ asset('assets/js/owl/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/owl/setting.js') }}"></script>
    <!-- Columns -->
    <script src="{{ asset('assets/js/column/bootstrap-grid-columns.js') }}"></script>

    <!-- Ticker -->
    <script src="{{ asset('assets/js/ticker/ticker.js') }}"></script>

    <!--Custom Form -->
    <script src="{{ asset('assets/js/form/jcf.js') }}"></script>
    <script src="{{ asset('assets/js/form/jcf.scrollable.js') }}"></script>
    <script src="{{ asset('assets/js/form/jcf.select.js') }}"></script>
    <!-- Form Wizard -->
    <script src="{{ asset('assets/js/form-wizard/jquery.formtowizard.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard/jquery.validationEngine.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard/jquery.validationEngine-en.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard/setting.js') }}"></script>
    <!-- Vegas -->
    <script src="{{ asset('assets/js/vegas/vegas.js') }}"></script>
    <script src="{{ asset('assets/js/vegas/setting.js') }}"></script>
    <!-- Custom Script -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <script src="{{ asset('assets/aos/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>

    @livewireScripts
</body>

</html>
