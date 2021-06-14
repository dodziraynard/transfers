@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Terminal <a href="{{ route('store_schedule') }}">New Schedule</a></h1>

    @if ($schedules->count())
        @foreach ($schedules as $schedule)
            <div class="flex">
                <p class="mb-2">From 
                    <strong>{{ $schedule->source->name }}</strong> to 
                    <strong>{{ $schedule->destination->name}} </strong>
                    @ {{ $schedule->departure_time }}
                    <em>[GHC {{$schedule->price}}]</em>
                    <small><a class="mx-3"  href="{{ route('update_schedule', $schedule) }}">Edit</a></small>
                </p>
             
                <form class="inline row confirmation-form" action="{{ route('delete_schedule') }}" method="post">
                    @csrf
                    <input name="id" type="hidden" value="{{ $schedule->id }}">
                    <button class="mx-3" type="submit"><small>Delete</small></button>
                </form>
                </p>
                <hr>
            </div>
        @endforeach
    @else
        <p>There are no schedules</p>
    @endif
@endsection
