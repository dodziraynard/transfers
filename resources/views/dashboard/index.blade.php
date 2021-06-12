@extends('layout.base')

@section('content')
<h1 class="text-xl bg-blue-300 my-3">Dashboard</h1>

<p><a href="{{route('bus')}}">Bus</a></p>
<p><a href="{{route('terminal')}}">Terminal</a></p>
<p><a href="{{route('schedule')}}">Schedule</a></p>
@endsection