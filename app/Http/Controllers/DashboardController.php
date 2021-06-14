<?php

namespace App\Http\Controllers;

use App\Http\Middleware\StaffOnly;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware([StaffOnly::class]);
    }
    
    public function index()
    {
        return view('dashboard.index');
    }
}
