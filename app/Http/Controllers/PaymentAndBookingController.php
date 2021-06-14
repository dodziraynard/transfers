<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentAndBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function payments()
    {
        $payments = Payment::all();
        return view('payment_and_booking.payment', [
            'payments' => $payments
        ]);
    }

    public function bookings()
    {
        $bookings = Booking::all();
        return view('payment_and_booking.booking', [
            'bookings' => $bookings
        ]);
    }


    public function user_payments()
    {
        $payments = auth()->user()->payments;
        return view('payment_and_booking.payment', [
            'payments' => $payments
        ]);
    }

    public function user_bookings()
    {
        $bookings = auth()->user()->bookings;
        return view('payment_and_booking.booking', [
            'bookings' => $bookings
        ]);
    }
}
