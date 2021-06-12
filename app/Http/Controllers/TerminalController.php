<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $terminals = Terminal::all();
        return view('terminal.index', [
            'terminals' => $terminals
        ]);
    }


    public function terminal_form(Request $request)
    {
        return view('terminal.form');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'numeric',
            'name' => 'required',
        ]);

        $id = $request->id;
        if($id){
            Terminal::whereId($id)->update($request->only('name'));
        } else{
            Terminal::create($request->all());
        }
        return redirect()->route('terminal');
    }

    public function update_form(Terminal $terminal, Request $request)
    {
        return view('terminal.form', [
            'terminal' => $terminal
        ]);
    }

    public function delete_terminal(Request $request)
    {   
        $id = $request->id;
        if($id){
            Terminal::whereId($id)->delete();
        }
        return back();
    }    
}
