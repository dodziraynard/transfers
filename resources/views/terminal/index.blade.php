@extends('layout.base')

@section('content')
    <h1 class="text-xl py-3 bg-blue-100 my-3">Terminal <a href="{{ route('store_terminal') }}">New Terminal</a></h1>

    @if ($terminals->count())
        @foreach ($terminals as $terminal)
            <div class="flex">
                <p class="mb-2">
                    {{ $terminal->name }}
                    <small><a class="mx-3"  href="{{ route('update_terminal', $terminal) }}">Edit</a></small>
                <form class="inline row confirmation-form" action="{{ route('delete_terminal') }}" method="post">
                    @csrf
                    <input name="id" type="hidden" value="{{ $terminal->id }}">
                    <button class="mx-3" type="submit"><small>Delete</small></button>
                </form>
                </p>
                <hr>
            </div>
        @endforeach
    @else
        <p>There are no terminals</p>
    @endif
@endsection
