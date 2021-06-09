<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $buses = Bus::all();
        return view('bus.index', [
            'buses' => $buses
        ]);
    }


    public function bus_form(Request $request)
    {
        return view('bus.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'numeric',
            'name' => 'required',
            'number' => 'required',
            'capacity' => 'required|numeric',
        ]);

        $id = $request->id;
        if($id){
            Bus::whereId($id)->update($request->only('name', 'number', 'capacity'));
        } else{
            Bus::create($request->all());
        }
        return redirect()->route('bus');
    }

    public function update_form(Bus $bus, Request $request)
    {
        return view('bus.form', [
            'bus' => $bus
        ]);
    }

    public function delete_bus(Request $request)
    {   
        $id = $request->id;
        if($id){
            Bus::whereId($id)->delete();
        }
        return back();
    }    
}
