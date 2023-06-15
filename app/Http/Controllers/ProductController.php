<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        return view('product.index',[
            'products' => $products,
            'active' => 'product'
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'categories' => Category::all(),
            'active' => 'product'
        ]);
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
            'image' => 'required|image|file|max:1024',
            'description' => 'required|min:5',
            
        ]);
         
        $productName = $request->name;
        // if($request->file('image')){
            $validator['image'] = $request->file('image')->store('product-images');
        // }
        
        $validator['status_id'] = 3;
        Product::create($validator);

        return redirect('/product')->with('success', 'Product ' . $productName . ' Berhasil Ditambahkan!');

              
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        return view('product.edit', [
            'products' => $product,
            'active' => 'product',
            'categories' => Category::all(),
            'status' => Status::all()
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
        $validator = $request->validate ([
            'name' => 'required|min:4|max:30',
            'price' => 'required|integer|min:4',
            'cat_id' => 'required',
            'description' => 'required|min:5',
            'image' => 'image|file|max:1024',
            // 'status_id' => 'required'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['image'] = $request->file('image')->store('product-images');
        }
        

        Product::where('id', $request->id)->update($validator);
        return redirect('/product')->with('success', 'Product Berhasil Diubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $productName = $product->name; 

        // Hapus gambar dari penyimpanan jika ada
        if ($product->image) {
            Storage::delete($product->image);
        }
    
        // Hapus data dari database
        $product->delete();
        // Product::find($id)->delete();
        return redirect('/product')->with('success', 'Product ' . $productName . ' Berhasil DiHapus!');
    }
}
