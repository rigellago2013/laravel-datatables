<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/marea.css')?>">
    <script src="<?php echo asset('js/marea.js')?>"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>









</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
                <a class="navbar-brand text-light">
                    {{ config('app.name', 'Marea') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
