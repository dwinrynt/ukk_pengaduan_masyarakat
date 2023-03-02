<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Petugas,
    User
};

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengawas = Petugas::where('status', 'admin')->orWhere('status', 'petugas')->get();
        return view('super_admin.pengawas.index', compact('pengawas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_admin.pengawas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nama_petugas' => 'required',
            'email' => 'required',
            'telp'  => 'required|numeric',
            'role'  => 'required'
        ]);

        $user = User::create([
            'name' => $request->nama_petugas,
            'email' => $request->email,
            'password' => bcrypt('00000000'),
            'role'     => $request->role
        ]);
        
        $pengawas = Petugas::create([
            'user_id' => $user->id,
            'nama_petugas' => $request->nama_petugas,
            'telp' => $request->telp,
            'status' => $request->role
        ]);

        return redirect()->route('pengawas.index')->with('success', 'Pengawas has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengawas = Petugas::find($id);
        return view('super_admin.pengawas.form', compact('pengawas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengawas = Petugas::find($id);
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telp'  => 'required|numeric',
            'role'  => 'required'
        ]);

        $user = User::create([
            'name' => $request->nama_petugas,
            'email' => $request->email,
            'role'     => $request->role
        ]);
        
        $pengawas = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'telp' => $request->telp,
            'status' => $request->role
        ]);
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
