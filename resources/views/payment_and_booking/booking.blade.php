@extends('layout.base')

@section('content')
<h1 class="text-xl py-3 my-3 text-center text-white">My Bookings</h1>


<div class="bg-blue-100 max-w-md mx-auto text-blue-500">
    <table class="table-fixed">
        <thead>
      <tr>
        <th class="w-1/4">Pick up location</th>
        <th class="w-1/4">Drop Location</th>
        <th class="w-1/4">Price</th>
        <th class="w-1/4">Date</th>
      </tr>
    </thead>
    <tbody>
        @if ($bookings->count())
        @foreach ($bookings as $booking)
            <tr class="bg-blue-200">
                <td><p class="text-center">{{ $booking->schedule->source->name }}</p></td>
                <td><p class="text-center">{{ $booking->schedule->destination->name }}</p></td>
                <td><p class="text-center">{{ $booking->schedule->price }}</p></td>
                <td><p class="text-center">{{ $booking->schedule->departure_time }}</p></td>
            </tr>
        @endforeach
    @else
        <p>There are no bookings</p>
    @endif
    </tbody>
  </table>
</div>

   
@endsection
