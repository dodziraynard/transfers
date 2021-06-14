@extends('layout.base')

@section('content')
<div class="m-3">
    <h2 class="text-center text-white">Login to Continue</h2>
</div>
    <div class="mt-4 flex justify-center">
        <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">

            <h3 class="mb-3">Enter your registered credentials</h3>
            @if (\Session::has('status'))
                <div class="bg-red-100 m-5 mx-auto p-3">
                    <div class="text-red-500 mt-2 text-sm">
                        <p class="text text-center">{!! \Session::get('status') !!}</p> 
                     </div>
                </div>

            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" required>

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="" required>

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>

                <p class="my-5">New here? <a class="text-blue-500" href="{{route('register')}}">Regiser</a> now.</p>
            </form>
        </div>
    </div>
@endsection
