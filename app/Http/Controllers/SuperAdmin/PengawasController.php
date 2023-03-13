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
            'email'        => 'required|unique:users',
            'telp'         => 'required|numeric|unique:petugas',
            'status'       => 'required',
            'password'     => 'required|min:8'
        ]);

        $user = User::create([
            'name'     => $request->nama_petugas,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->status
        ]);
        
        $pengawas = Petugas::create([
            'user_id'       => $user->id,
            'nama_petugas'  => $request->nama_petugas,
            'telp'          => $request->telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status'        => $request->status
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
            'nama_petugas'  => 'required',
            'email'         => 'required',
            'telp'          => 'required|numeric',
            'jenis_kelamin' => 'required',
            'status'        => 'required'
        ]);
        $pengawas->update($attributes);
        return redirect()->route('pengawas.index')->with('success', 'Pengawas has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $pengawas = Petugas::find($id);
        // $pengawas->delete();
        // return redirect()->route('pengawas.index')->with('success', 'Pengawas has been deleted');
    }
}
