@extends('layout.base')

@section('content')
<h1>Payment</h1>

<div class="mt-4 flex justify-center">
    <div class="sm:w-11/12 md:w-4/12 bg-white p-6 rounded-lg">
        <form action="{{route('book_me')}}" method="post">
            @csrf

            <input name="schedule_id" type="hidden" value="{{ $schedule->id }}">

            <div class="mb-4">
                <label for="payment_method" class="">Select Payment Method</label>
                <select name="payment_method" id="payment_method"
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg" required>
                    <option value="">----- Select ----</option>
                    <option value="MTN Mobile Mobile">MTN Mobile Mobile</option>
                    <option value="Vodafone Cash">Vodafone Cash</option>
                    <option value="AirtelTigo Money">AirtelTigo Money</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="number" class="sr-only">Mobile Number</label>
                <input type="text" name="number" id="number" placeholder="Number"
                    title="Ten digits with a leading 0."
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('number') border-red-500 @enderror"
                    value="{{ old('number') }}" 
                    pattern="[0-9]{10}"
                    required>

                @error('number')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Make Payment</button>
            </div>
        </form>
    </div>
</div>
@endsection