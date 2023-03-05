<?php

namespace App\Http\Controllers\Petugas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{
    Pengaduan
};
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPengaduan;

class ReviewPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan  = Pengaduan::where('status', 'proses')->orWhere('status', 'selesai')->get();
        $verifikasi = Pengaduan::where('status', 'menunggu verifikasi')->get();
        return view('petugas.review_pengaduan.index', compact('pengaduan', 'verifikasi'));
    }

    public function verifikasi(Request $request, $id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->update($request->all());
        return redirect()->route('review-pengaduan.index')->with('success', 'Pengaduan has been verified!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('petugas.review_pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('petugas.review_pengaduan.form', compact('pengaduan'));
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
        $pengaduan  = Pengaduan::find($id);
        $attributes = $request->validate([
            'tanggapan'           => 'required',
            'tanggal_tanggapan' => 'required'
        ]);
        
        $attributes = $request->all();

        $pengaduan->update($attributes);
        return redirect()->route('review-pengaduan.index')->with('success', 'Pengaduan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(404);
    }

    public function exportPDF()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')->get();
 
    	$pdf = PDF::loadview('petugas.pengaduan_pdf',compact('pengaduan'));
    	return $pdf->download('pengaduan-pdf.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ExportPengaduan, 'pengaduan.xlsx');
    }
}
