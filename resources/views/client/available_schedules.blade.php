@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Choose your schedule</h1>

    @if ($schedules->count())
        @foreach ($schedules as $schedule)
            <div class="my-3 bg-blue-300 p-1 flex">
                <form class="inline row" action="{{ route('preview_booking') }}" method="post">
                    @csrf                    
                    <input name="schedule_id" type="hidden" value="{{ $schedule->id }}">
 
                    <p class="mb-2">From 
                        <strong>{{ $schedule->source->name }}</strong> to 
                        <strong>{{ $schedule->destination->name }}</strong> 
                        @ {{ $schedule->departure_time }} 
                        <em>[GHC {{$schedule->price}}]</em>
                        <p>Bus Capacity: {{$schedule->bus->capacity}}</p>
                    <button class="btn mt-1" type="submit"><small>Choose</small></button>
                    </p>
                </form>
                </p>
                <hr>
            </div>
        @endforeach
    @else
        <p>There are no schedules</p>
    @endif
@endsection
