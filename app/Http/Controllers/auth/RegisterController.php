<?php

namespace App\Http\Controllers\Auth;

use PDOException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {

        return view('auth.register');
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

         try {
            User::create([
                'name' => $request->name,
                'contact' => $request->contact,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);    
        } catch (PDOException $exc) {
            if(str_contains( $exc->getMessage() , "Integrity constraint violation" )){
                return view('auth.register', [
                    'error_message' => "Email already taken."
                ]);
            }
        }

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard');
    }
}
