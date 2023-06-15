<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $products = Product::where('status_id',1)->get();
        return view('landing', [
            'slides' => $slides,
            'category' => Category::all(),
            'products' => $products,
            'active' => 'home'
        ]);
    }
}
