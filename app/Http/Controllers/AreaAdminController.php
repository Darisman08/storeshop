<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaAdminController extends Controller
{
    public function index()
    {
        return view('dash', [
            'active' => 'dash'
        ]);
    }
}
