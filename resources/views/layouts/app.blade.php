<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="meta_description">
    <meta name="keyword" content="meta_keyword">
    <meta name="author" content="E-Commarce">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('asstes/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asstes/css/custom.css') }}">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    @livewireStyles
</head>

<body>
    <div id="app">


        @include('layouts.inc.frontend.navbar')



        <main>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('asstes/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('asstes/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        window.addEventListener('message', event => {

            if (event.detail) {
                
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }
        });
    </script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
