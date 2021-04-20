<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q="
      crossorigin="anonymous"
    />

    <!-- Styles -->
    <link href="{{ asset('css/cms/app.css') }}" rel="stylesheet">

    @yield('headlinks')
</head>
<body>
    <div id="app">


              <x-manage.side-navbar />
              <!-- sidebar -->
              <!-- top nav -->

              <x-manage.top-navbar />

              <!-- top nav -->

              <div class="pusher">
                <div class="main-content p-10">

                    <x-manage.messages />

                <main>
                    @yield('content')
                </main>

                </div>
              </div>






        </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    @stack('scripts')
    {{-- <script>
        $(document).ready(function() {
            $('.ui.dropdown').dropdown();
            $('.sidebar-menu-toggler').on('click', function() {
                var target = $(this).data('target');
                $(target)
                .sidebar({
                    dinPage: true,
                    transition: 'overlay',
                    mobileTransition: 'overlay'
                })
                .sidebar('toggle');
            });
        });
    </script> --}}

    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('js/cms/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
