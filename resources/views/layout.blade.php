<!DOCTYPE html>
<html>
<head>

    <title>Regex</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"/>

    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- vue -->
    <script src="{{ URL::asset('assets/js/vue.js') }}"></script>

</head>
<body>

<div class="container-fluid">
    <div class="navbar">
        <div class="logo">
            <h3 class="logo"
                onclick="location.href='main';"
            >Project name</h3>
        </div>
        <nav>
            <ul>
                @if (Auth::check())
                    <li class="button button-favorites"><i class="fas fa-heart"></i> favorites</li>
                @endif

                <li class="button button-upload"
                    onclick="location.href='image-upload';"
                >upload
                </li>

                @if (Auth::check())
                    <li class="button button-login"
                        onclick="location.href='logout';"
                    >logout
                    </li>                @else
                    <li class="button button-login"
                        onclick="location.href='login';"
                    >login
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>