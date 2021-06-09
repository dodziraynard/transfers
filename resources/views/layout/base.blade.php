<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticketing</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <nav class="p-6 bg-white">
        <ul class="flex justify-start text-lg">
            <li>
                <a href="/">Home</a>
            </li>

            @auth
                <li class="ml-3">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <form class="ml-2" action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth

            @guest
                <li class="ml-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>

                <li class="ml-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>
            @endguest
        </ul>
    </nav>
    <div class="m-2">
        @yield('content')
    </div>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
