<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sanbercode</title>

    <link href="{{ secure_asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />

    <!-- Styles -->
    <style>
        #welcome {
            background: url("{{ secure_asset('img/welcome.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-fluid {
            background: rgba(42, 38, 61, 0.82);
            height: 100vh;
        }

    </style>
    @stack('style')
</head>

<body id="welcome">
    <div class="container-fluid">
        @yield('content')
    </div>

    @stack('script')
</body>

</html>
