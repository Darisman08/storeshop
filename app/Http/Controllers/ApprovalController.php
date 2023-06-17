<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_pro()
    {
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->join('status', 'products.status_id', '=', 'status.id')
            ->select('products.*', 'categories.name as cat_name', 'status.name as sta_name')
            ->orderByDesc('status_id')
            ->get();

        return view('approval.index_pro', [
            'products' => $products,
            'active' => 'approve-pro'
        ]);
    }

    public function index_sli()
    {
        $slides = DB::table('slides')
            ->join('status', 'slides.status_id', '=', 'status.id')
            ->select('slides.*', 'status.name as sta_name')
            ->latest()
            ->get();

        return view('approval.index_sli',  [
            'slides' => $slides,
            'active' => 'approve-sli'
        ]);
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

        //

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pro(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required',
            'status_id' => 'required'
        ]);

        $productId = $request->id;

        Product::where('id', $productId)->update(['status_id' => $request->status_id]);

        return redirect('/approve-pro');
    }

    public function update_sli(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required',
            'status_id' => 'required'
        ]);

        $slideId = $request->id;

        Slide::where('id', $slideId)->update(['status_id' => $request->status_id]);

        return redirect('/approve-sli');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
