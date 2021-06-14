@extends('layout.base')

@section('content')
    <div class="m-3">
        <h1 class="text-center text-white">NEED A RIDE?</h1>
        <h3 class="text-center text-white">Welcome to Transfer!</h3>
    </div>

    <div class="mt-4 flex justify-center" id="">
        <div class="sm:w-11/12 md:w-4/12 bg-glass p-6 rounded-lg">                    
            <form action="{{route('select_schedule')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="source_id" class="">Pick Up Location</label>
                    <select name="source_id" id="source_id"
                        class="bg-glass border-2 w-full p-4 rounded-lg @error('source_id') border-red-500 @enderror"
                        required>
                        <option value="">----- Select ----</option>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="destination_id" class="">Drop Location</label>
                    <select name="destination_id" id="destination_id"
                        class="bg-glass border-2 w-full p-4 rounded-lg @error('destination_id') border-red-500 @enderror"
                        required>
                        <option value="">----- Select ----</option>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}">{{ $terminal->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="departure_date" class="">Date</label>
                    <input type="date" 
                        name="departure_date" 
                        id="departure_date"
                        class="js-update-date min-date-today bg-glass border-2 w-full p-4 rounded-lg" required>
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection