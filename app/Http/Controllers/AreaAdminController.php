<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Http\Request;

class AreaAdminController extends Controller
{
    public function index()
    {
        $product = Product::count('id');
        $slide = Slide::count('id');
        $user = User::count('id');

        return view('dash', [
            'active' => 'dash',
            'product' => $product,
            'slide' => $slide,
            'user' => $user
        ]);
    }
}
