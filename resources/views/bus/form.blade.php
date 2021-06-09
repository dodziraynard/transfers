@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Store Bus Details</h1>
    <div class="mt-4 flex justify-center">
        <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">

            <div class="text-red-500 m-2 text-center text-xl">
                {{ $error_message ?? '' }}
            </div>

            <h2 class="mb-3 text text-center text-xl">Store Bus</h2>

            <form action="{{ route('store') }}" method="post">
                @csrf

                @if($bus ?? '')
                    <input name="id" type="hidden" value="{{$bus->id}}">
                @endif

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ $bus->name ?? old('name') }}" required>

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="number" class="sr-only">Number</label>
                    <input type="text" name="number" id="number" placeholder="Number" title="Ten digits with a leading 0."
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('number') border-red-500 @enderror"
                        value="{{ $bus->number ??  old('number') }}" required>

                    @error('number')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="capacity" class="sr-only">Capacity</label>
                    <input type="number" name="capacity" id="capacity" placeholder="Capacity"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('capacity') border-red-500 @enderror"
                        value="{{ $bus->capacity ?? old('capacity') }}" required>

                    @error('capacity')
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
