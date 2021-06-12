<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Terminal;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', [
            'schedules' => $schedules
        ]);
    }


    public function schedule_form(Request $request)
    {
        $terminals = Terminal::all();
        $buses = Bus::all();

        return view('schedule.form', [
            'terminals' => $terminals,
            'buses' => $buses
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'numeric',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'price' => 'required|numeric',
            'bus_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'source_id' => 'required|numeric',
        ]);

        $id = $request->id;
        if($id){
            Schedule::whereId($id)->update($request->only('departure_time', 
                                                            'departure_time', 
                                                            'arrival_time', 
                                                            'price',
                                                            'bus_id',
                                                            'destination_id',
                                                            'source_id'
                                        ));
        } else{
            Schedule::create($request->all());
        }
        return redirect()->route('schedule');
    }

    public function update_form(Schedule $schedule, Request $request)
    {
        $terminals = Terminal::all();
        $buses = Bus::all();
        
        return view('schedule.form', [
            'terminals' => $terminals,
            'buses' => $buses,
            'schedule' => $schedule
        ]);
    }

    public function delete_schedule(Request $request)
    {   
        $id = $request->id;
        if($id){
            Schedule::whereId($id)->delete();
        }
        return back();
    }    
}
