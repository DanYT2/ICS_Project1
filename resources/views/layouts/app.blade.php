<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
{{--      @extends('admin.layouts.header')--}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
      <link rel="stylesheet" href="{{ asset('../template/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/icon-kit/dist/css/iconkit.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/ionicons/dist/css/ionicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/jvectormap/jquery-jvectormap.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/weather-icons/css/weather-icons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/c3/c3.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../template/dist/css/theme.min.css') }}">
      <script src="{{ asset('../template/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
      <link rel="stylesheet" href="{{ asset('../template/dist/css/theme.min.css') }}">
      <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" defer></script>

      <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <script>
          let dateToday = new Date();
          $( function() {
            $('#datepicker').datepicker({
              dateFormat: 'yy-mm-dd',
              showButtonPanel: true,
              numberOfMonths: 1,
              minDate: dateToday,
            })
          } );
        </script>
        <style>
          label.btn{
            padding: 0;
          }
          label.btn input{
            opacity: 0;
            position: absolute;
          }
          label.btn span{
            text-align: center;
            padding: 6px 12px;
            display: block;
            min-width: 80px;
          }
          label.btn input:checked+span{
            background-color: rgb(80, 110, 228);
            color: #FFFFFF;
          }
        </style>
        @stack('modals')

        @livewireScripts
    </body>
</html>
