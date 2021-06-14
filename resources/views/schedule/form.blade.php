@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Store Schedule Details</h1>
    <div class="mt-4 flex justify-center">
        <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">

            <div class="text-red-500 m-2 text-center text-xl">
                {{ $error_message ?? '' }}
            </div>

            <h2 class="mb-3 text text-center text-xl">Store Schedule</h2>

            <form action="{{ route('store_schedule') }}" method="post">
                @csrf

                @if ($schedule ?? '')
                    <input name="id" type="hidden" value="{{ $schedule->id }}">
                @endif

                <div class="mb-4">
                    <label for="departure_time" class="">Departure Time</label>
                    <input type="datetime-local" 
                        name="departure_time" id="departure_time"
                        class="js-update-date min-date-today bg-gray-100 border-2 w-full p-4 rounded-lg @error('departure_time') border-red-500 @enderror"

                        @if(old('departure_time')??'')
                            value="{{ old('departure_time')}}" 
                        @elseif(isset($schedule))
                            value="{{ $schedule->departure_time  }}" 
                        @endif
                        required>

                    @error('departure_time')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="arrival_time" class="">Estimated Time of Arrival</label>
                    <input type="datetime-local" name="arrival_time" id="arrival_time"
                        class="js-update-date min-date-today bg-gray-100 border-2 w-full p-4 rounded-lg @error('arrival_time') border-red-500 @enderror"

                        @if(old('arrival_time'))
                            value="{{ old('arrival_time')}}" 
                        @elseif(isset($schedule))
                            value="{{ $schedule->arrival_time  }}" 
                        @endif
                        required>

                    @error('arrival_time')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="source_id" class="">From</label>
                    <select name="source_id" id="source_id"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('source_id') border-red-500 @enderror"
                        required>
                        <option value="">----- Select ----</option>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}"
                                @if (old('source_id') == $terminal->id || (isset($schedule) and $schedule->source_id == $terminal->id ))
                                    selected
                                @endif
                                >{{ $terminal->name }}</option>
                        @endforeach
                    </select>
                    @error('source_id')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="destination_id" class="">To</label>
                    <select name="destination_id" id="destination_id"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('destination_id') border-red-500 @enderror"
                        required>
                        <option value="">----- Select ----</option>
                        @foreach ($terminals as $terminal)
                            <option value="{{ $terminal->id }}"
                                @if (old('destination_id') == $terminal->id || (isset($schedule) and $schedule->destination_id == $terminal->id ))
                                    selected
                                @endif
                                >{{ $terminal->name }}</option>
                        @endforeach
                    </select>
                    @error('destination_id')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="bus_id" class="">Bus</label>
                    <select name="bus_id" id="bus_id"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('bus') border-red-500 @enderror" required>
                        <option value="">----- Select ----</option>
                        @foreach ($buses as $bus)
                            <option value="{{ $bus->id }}"
                                @if (old('bus_id') == $bus->id || (isset($schedule) and $schedule->bus_id == $bus->id ))
                                    selected
                                @endif
                                >{{ $bus->name }}</option>
                        @endforeach
                    </select>
                    @error('bus')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror"
                        value="{{ $schedule->price ?? old('price') }}" required>

                    @error('price')
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
