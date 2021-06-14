@extends('layout.base')

@section('content')
<h1>Preview</h1>

<div class="mt-4 flex justify-center">
    <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">
        <form action="{{route('payment')}}" method="post">
            @csrf
            <input name="schedule_id" type="hidden" value="{{ $schedule->id }}">

            <h4>Booking Details</h4>
            <p class="mb-2">From 
                <strong>{{ $schedule->source->name }}</strong> to 
                <strong>{{ $schedule->destination->name }}</strong> 
                @ {{ $schedule->departure_time }} 
                <em>[GHC {{$schedule->price}}]</em>
            <div>

            <i>Estimated time of arrival: {{$schedule->arrival_time}}</i>
            <br>
            <br>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Continue to Make Payment</button>
            </div>
        </form>
    </div>
</div>
@endsection