<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', [
            'category' => $category,
            'active' => 'category'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create',  [
            'active' => 'category'
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
            'description' => 'required|min:5'
        ]);
         
        $categoryName = $request->name;
       
        Category::create($validator);

        return redirect('/category')->with('success', 'Category ' . $categoryName . ' Berhasil Ditambahkan!');
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
        $category = Category::find($id);
        return view('category.edit', [
            'category' => $category,
            'active' => 'category'
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
            'description' => 'required|min:5',
        ]);        

        Category::where('id', $request->id)->update($validator);
        return redirect('/category')->with('success', 'Category Berhasil Diubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $categoryName = $category->name; 

        // Hapus data dari database
        $category->delete();
        // category::find($id)->delete();
        return redirect('/category')->with('success', 'Category ' . $categoryName . ' Berhasil DiHapus!');
    }
}
