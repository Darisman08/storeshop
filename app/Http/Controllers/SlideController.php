<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = DB::table('slides')
            ->join('status', 'slides.status_id', '=', 'status.id')
            ->select('slides.*', 'status.name as sta_name')
            ->latest()
            ->get();

        return view('slide.index',  [
            'slides' => $slides,
            'active' => 'slide'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create',   [
            'active' => 'slide'
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
            'image' => 'required|image|file|max:1024'            
        ]);
         
        $slideName = $request->name;
        // if($request->file('image')){
            $validator['image'] = $request->file('image')->store('slide-images');
        // }
        
        $validator['status_id'] = 3;
        Slide::create($validator);

        return redirect('/slide')->with('success', 'Slide ' . $slideName . ' Berhasil Ditambahkan!');

              
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
        $slides = Slide::find($id);
        return view('slide.edit',[
            'slides' => $slides,
            'active' => 'slide'
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
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validator['image'] = $request->file('image')->store('slide-images');
        }        

        Slide::where('id', $request->id)->update($validator);
        return redirect('/slide')->with('success', 'Slide Berhasil Diubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slideName = $slide->name; 

        // Hapus gambar dari penyimpanan jika ada
        if ($slide->image) {
            Storage::delete($slide->image);
        }
    
        // Hapus data dari database
        $slide->delete();
        // slide::find($id)->delete();
        return redirect('/slide')->with('success', 'Slide ' . $slideName . ' Berhasil DiHapus!');
    }
}

