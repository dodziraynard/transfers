@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Store Terminal Details</h1>
    <div class="mt-4 flex justify-center">
        <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">

            <div class="text-red-500 m-2 text-center text-xl">
                {{ $error_message ?? '' }}
            </div>

            <h2 class="mb-3 text text-center text-xl">Store Terminal</h2>

            <form action="{{ route('store_terminal') }}" method="post">
                @csrf

                @if($terminal ?? '')
                    <input name="id" type="hidden" value="{{$terminal->id}}">
                @endif

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ $terminal->name ?? old('name') }}" required>

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
