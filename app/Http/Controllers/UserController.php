<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->latest()
            ->get();

        return view('user.index',  [
            'users' => $users,
            'active' => 'user'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'roles' => Role::all(),
            'active' => 'user'
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
            'name' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|min:5|max:255',
            'role_id' => 'required',
            'image' => 'required|image|file|max:1024',
            'position' => 'required|min:2',
            
        ]);
        $validator['password'] = bcrypt('rahasia');
        
        $userName = $request->name;
        // if($request->file('image')){
            $validator['image'] = $request->file('image')->store('user-images');
        // }
        User::create($validator);

        return redirect('/user')->with('success', 'User ' . $userName . ' Berhasil Ditambahkan!');

              
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
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('users.id', $id)
            ->select('users.*', 'roles.name as role_name')
            ->first();
        return view('user.edit', [
            'users' => $users,
            'active' => 'user',
            'roles' => Role::all()
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
    $validator = $request->validate([
        'name' => 'required|min:5|max:255',
        'email' => 'required|email',
        'address' => 'required|min:5|max:255',
        'role_id' => 'required',
        'image' => 'image|file|max:1024',
        'position' => 'required|min:2',            
    ]);

    if ($request->file('image')) {
        if ($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $validator['image'] = $request->file('image')->store('user-images');
    } else {
        unset($validator['image']); // Menghapus kunci 'image' dari array validator jika tidak ada file gambar yang diunggah
    }

    $user = User::findOrFail($request->id);
    $user->update($validator);

    return redirect('/user')->with('success', 'User Berhasil Diubah!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $userName = $user->name; 

        // Hapus gambar dari penyimpanan jika ada
        if ($user->image) {
            Storage::delete($user->image);
        }
    
        // Hapus data dari database
        $user->delete();
        // user::find($id)->delete();
        return redirect('/user')->with('success', 'user ' . $userName . ' Berhasil DiHapus!');
    }
}
