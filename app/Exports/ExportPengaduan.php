<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportPengaduan implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengaduan::where('status', 'selesai')->get();
    }

    public function view(): View
    {
        // $request = $this->request;
        $pengaduan =  Pengaduan::where('status', 'selesai')->get();
        
        return view('petugas.exportExcel', compact('pengaduan'));
    }
}
