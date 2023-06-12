<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('status', 'products.status_id', '=', 'status.id')
            ->select('products.*', 'categories.name as cat_name', 'status.name as sta_name')
            ->latest()
            ->get();

        return view('product.product', compact('products'));
    }

    public function table()
    {
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('status', 'products.status_id', '=', 'status.id')
            ->select('products.*', 'categories.name as cat_name', 'status.name as sta_name')
            ->latest()
            ->get();

        return view('product.product_table', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = $request->validate([
            'name' => 'required|min:4|max:30',
            'price' => 'required|integer|min:4',
            'cat_id' => 'required',
            'description' => 'required|min:5',
            'image' => 'image|file|max:1024',
            'status_id' => 'required'
        ]);

        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('product-images');
        }

        $product = Product::create($validator);
        return response()->json([
            'status' => 'success',
            'success' => 'Product Berhasil Ditambahkan!',
            'data' => $product
        ]);

        // return redirect('/product')->with('success', 'Data berhasil ditambahkan!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('status', 'products.status_id', '=', 'status.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name as cat_name', 'status.name as sta_name')
            ->first();
            
        return response()->json([
            'message' => 'Data Berhasil Diambil!',
            'data'    => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
        $validator = $request->validate ([
            'name' => 'required|min:4|max:30',
            'price' => 'required|integer|min:4',
            'cat_id' => 'required',
            'description' => 'required|min:5',
            'image' => 'required|image|file|max:1024',
            'status_id' => 'required'
        ]);

        if($request->file('image')){
            $validator['image'] = $request->file('image')->store('product-images');
        }
        

        $product = Product::find($request->id)->update($validator);

        
        return response()->json([
            'status' => 'success',
            'success' => 'Data berhasil diupdate!',
            'data' => $product
        ]);
        
        // return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('/product');
    }
}
