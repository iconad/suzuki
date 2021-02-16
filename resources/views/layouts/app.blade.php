<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Suzuki') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @yield('headlinks')
</head>
<body>
    <div id="app">
        <div>
            {{-- <x-topnav /> --}}
        </div>
        <nav class="bg-white shadow-xl relative z-10">
            {{-- <x-main-navbar /> --}}
            @livewire('main-navbar')
        </nav>
        <side-buttons></side-buttons>
        <main>
            @yield('content')
        </main>


        <footer class="mt-12">
            <x-main-footer />
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
    @yield('scripts')

</body>
</html>
