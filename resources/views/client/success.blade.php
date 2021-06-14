@extends('layout.base')

@section('content')
<h1>Preview</h1>

<div class="mt-4 flex justify-center">
    <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">
       <h1>Payment Successful</h1>

        <h4>Booking Details</h4>
        <hr>
        
        <p class="mb-2">From 
            <strong>{{ $schedule->source->name }}</strong> to 
            <strong>{{ $schedule->destination->name }}</strong> 
            @ {{ $schedule->departure_time }} 
            <p>Price: GHC {{$schedule->price}}</p>
        <div>

        <i>Estimated time of arrival: {{$schedule->arrival_time}}</i>
        <br>
        <br>

        <div>
            <a href="{{route('home')}}">
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Home</button>
            </a>
        </div>
    </div>
</div>
@endsection