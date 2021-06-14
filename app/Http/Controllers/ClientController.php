<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Payment;
use App\Models\Schedule;
use App\Models\Terminal;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except("index");
    }

    public function index(Request $request)
    {
        $buses = Bus::all();
        $terminals = Terminal::all();
        return view('client.index', [
            'buses' => $buses,
            'terminals' => $terminals
        ]);
    }

    public function select_schedule(Request $request)
    {
        $this->validate($request, [
            'source_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'departure_date' => 'required',
        ]);

        $schedules = Schedule::where('source_id', '=', $request->source_id);
        $schedules = $schedules->where('destination_id', '=', $request->destination_id);
        $schedules = $schedules->where('departure_time', '>=', $request->departure_date)->get();

        return view('client.available_schedules', [
            'schedules' => $schedules
        ]);
    }

    public function preview_booking(Request $request)
    {
        $this->validate($request, [
            'schedule_id' => 'required|numeric',
        ]);
        
        $schedule = Schedule::find($request->schedule_id);
        return view('client.preview', [
            'schedule' => $schedule
        ]);
    }

    public function payment(Request $request)
    {
        $this->validate($request, [
            'schedule_id' => 'required|numeric',
        ]);

        $schedule = Schedule::find($request->schedule_id);
        return view('client.payment', [
            'schedule' => $schedule
        ]);
    }

    public function book_me(Request $request)
    {
        $this->validate($request, [
            'schedule_id' => 'required|numeric',
            'payment_method' => 'required|string',
            'number' => 'required|numeric',
        ]);

        $schedule = Schedule::find($request->schedule_id);

        $payment = Payment::create([
            'number' => $request->number, 
            'amount' => $schedule->price, 
            'user_id'=>$request->user()->id, 
            'note'=>'Payment successful'
        ]);

        Booking::create([
            'payment_id'=>$payment->id,
            'user_id'=>$request->user()->id,
            'schedule_id'=>$schedule->id,
        ]);

        return view('client.success', [
            'schedule' => $schedule
        ]);
    }
}
