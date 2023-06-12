<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('/register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'address' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['role_id'] = 4;

        User::create($validateData);

        // $request->session()->flash('success', 'Register Berhasil');
        return redirect('/login')->with('success', 'Register Berhasil, Silakan Login!');
    }
}
