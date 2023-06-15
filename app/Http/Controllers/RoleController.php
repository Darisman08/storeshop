<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', [
            'roles' => $roles,
            'active' => 'role'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create', [
            'active' => 'role'
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
         
        $roleName = $request->name;
       
        Role::create($validator);

        return redirect('/role')->with('success', 'Role ' . $roleName . ' Berhasil Ditambahkan!');
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
        $roles = Role::find($id);
        return view('role.edit', [
            'roles' => $roles,
            'active' => 'role'
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

        Role::where('id', $request->id)->update($validator);
        return redirect('/role')->with('success', 'Role Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $roleName = $role->name; 

        // Hapus data dari database
        $role->delete();
        // role::find($id)->delete();
        return redirect('/role')->with('success', 'Role ' . $roleName . ' Berhasil DiHapus!');
    }
}
