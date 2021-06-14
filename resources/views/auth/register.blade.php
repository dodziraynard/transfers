@extends('layout.base')

@section('content')
    <div class="mt-4 flex justify-center">
        <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">

            <div class="text-red-500 m-2 text-center text-xl">
                {{ $error_message ?? "" }}
            </div>

            <h2 class="mb-3 text text-center text-xl">Register</h2>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Full Name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" required>

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact" placeholder="Contact"
                        title="Ten digits with a leading 0."
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('contact') border-red-500 @enderror"
                        value="{{ old('contact') }}" 
                        pattern="[0-9]{10}"
                        required>

                    @error('contact')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
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
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="" required>

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Repeat your password"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        value="" required>

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                </div>

                <p class="my-5">Already have an account? Login <a class="text-blue-500" href="{{route('login')}}">here.</a></p>
            </form>
        </div>
    </div>
@endsection
