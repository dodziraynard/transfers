@extends('layout.base')

@section('content')
<h1 class="text-xl py-3 my-3 text-center text-white">Payment History</h1>


<div class="bg-blue-100 max-w-md mx-auto text-blue-500">
    <table class="table-fixed">
        <thead>
      <tr>
        <th class="w-1/4">Date</th>
        <th class="w-1/4">Amount</th>
      </tr>
    </thead>
    <tbody>
        @if ($payments->count())
        @foreach ($payments as $payment)
            <tr class="bg-blue-200">
                <td><p class="text-center">{{ $payment->created_at }}</p></td>
                <td><p class="text-center">{{ $payment->amount }}</p></td>
            </tr>
        @endforeach
    @else
        <p>There are no payments</p>
    @endif
    </tbody>
  </table>
</div>

   
@endsection
