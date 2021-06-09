@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Buses <a href="{{ route('store') }}">New Bus</a></h1>

    @if ($buses->count())
        @foreach ($buses as $bus)
            <div class="flex">
                <p class="mb-2">
                    {{ $bus->name }}
                    <small><a class="mx-3"  href="{{ route('update_bus', $bus) }}">Edit</a></small>
                <form class="inline row confirmation-form" action="{{ route('delete_bus') }}" method="post">
                    @csrf
                    <input name="id" type="hidden" value="{{ $bus->id }}">
                    <button class="mx-3" type="submit"><small>Delete</small></button>
                </form>
                </p>
                <hr>
            </div>
        @endforeach
    @else
        <p>There are no buses</p>
    @endif
@endsection
