<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sanbercode</title>

    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Pacifico" />

    <!-- Styles -->
    <style>
        #welcome {
            background: url("{{ asset('img/welcome.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-fluid {
            background: rgba(42, 38, 61, 0.82);
            height: 100vh;
        }

        h1 {
            margin-top: 200px;
            color: whitesmoke;
            font-family: Pacifico;
            font-size: 48px;
            line-height: 84px;
        }

        li, a {
            color: whitesmoke;
        }

    </style>
</head>

<body id="welcome">

    <div class="container-fluid">
        @if(Route::has('login'))
            <ul class="nav justify-content-end">

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        @endif
        <div class="d-flex justify-content-center">
            <h1>Sanbercode</h1>
        </div>
        <div class="d-flex justify-content-center">
            <h5 style="color: whitesmoke">Feel free to ask..</h5>
        </div>
    </div>
</body>

</html>
