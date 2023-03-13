<?php

namespace App\Http\Controllers\Masyarakat;

use App\Models\{
    Kategori,
    Pengaduan,
};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('masyarakat_id', auth()->user()->masyarakat->id)->get();
        return view('masyarakat.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('masyarakat.pengaduan.form', compact('kategori'));
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
            'masyarakat_id'     => 'required',
            'kategori_id'       => 'required',
            'laporan'           => 'required',
            'path_foto'         => 'image|mimes:png,jpg,jpeg|max:5120',
            'alamat'            => 'required',
            'tanggal_pengaduan' => 'required'
        ]);

        $attributes = $request->all();
        if ($request->path_foto) {
            $path_foto = $request->file('path_foto')->store('path_foto');
            $attributes['path_foto'] = $path_foto;
        }

        $pengaduan = Pengaduan::create($attributes);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.pengaduan.form', compact('kategori', 'pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $pengaduan = Pengaduan::find($id);
        $attributes = $request->validate([
            'kategori_id'     => 'required',
            'laporan'           => 'required',
            'tanggal_pengaduan' => 'required'
        ]);
        $attributes = $request->all();
        if ($request->path_foto) {
            $path_foto = $request->file('path_foto')->store('path_foto');
            $attributes['path_foto'] = $path_foto;
        }

        $pengaduan->update($attributes);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
