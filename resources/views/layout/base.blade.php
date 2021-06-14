<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Ticketing</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between">
        <ul class="flex justify-start text-lg">
            <li>
                <a href="/">Home</a>
            </li>

            @auth
                @if(auth()->user()->is_staff)
                <li class="ml-3">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                @endif

                <li class="ml-3">
                    <a href="{{ route('user_bookings') }}">My Bookings</a>
                </li>

                <li class="ml-3">
                    <a href="{{ route('user_payments') }}">Payment History</a>
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
        @auth
            <p class="text text-right">Hi! {{auth()->user()->name}}</p>
        @endauth
    </nav>
    
    <div class="p-2" id="client-content">
        @yield('content')
    </div>
    <footer>

        <div class="mb-5 grid sm:grid-cols-12 gap-4 md:grid-cols-3">
            <div class="mb-5">
                <h3 class="mb-2">ABOUT US</h3>
                <p>Transfer is a privately owned comapny that provides top-notch transportation services. </p>
            </div>
            <div class="mb-5">
                <h3 class="mb-2">NEED HELP?</h3>
                <p>Contact us via phone or email: </p>
                <p>+233 249 111 222</p>
                <p>suport@transfer.com</p>
            </div>
            <div class="mb-5">
                <h3 class="mb-2">OUR NEWSLETTER</h3>
                <form action="" class="flex justify-between">
                    <input type="email" placeholder="Your email" name="email" id="email" class="bg-glass border-2 w-full p-4 rounded-lg">
                    <button class="ml-4 btn brightness-50">Subscribe</button>
                </form>
            </div>
            <!-- ... -->
          </div>
        <hr>
        <p class="my-3">Copyright 2021, Transfer. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
