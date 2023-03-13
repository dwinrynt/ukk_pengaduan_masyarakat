@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Detail Pengaduan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="petugas_id" class="form-label" style="min-width: 10rem;">Verifikator</label>:
                        {{ $pengaduan->petugas->nama_petugas ?? '-' }}
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label" style="min-width: 10rem;">Nama</label>:
                        {{ $pengaduan->masyarakat->nama }}
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label" style="min-width: 10rem;">NIK</label>:
                        {{ $pengaduan->masyarakat->nik }}
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label" style="min-width: 10rem;">Alamat</label>:
                        {{ $pengaduan->alamat }}
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label" style="min-width: 10rem;">Nama Kategori</label>:
                        {{ $pengaduan->kategori->nama_kategori }}
                    </div>
                    <div class="mb-3">
                        <label for="laporan" class="form-label" style="min-width: 10rem;">Laporan</label>:
                        {{ $pengaduan->laporan }}
                    </div>
                    <div class="mb-3">
                        <label for="tanggapan" class="form-label" style="min-width: 10rem;">Tanggapan</label>:
                        {{ $pengaduan->tanggapan ?? '-' }}
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengaduan" class="form-label" style="min-width: 10rem;">Tanggal Pengaduan</label>:
                        {{ $pengaduan->tanggal_pengaduan }}
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_tanggapan" class="form-label" style="min-width: 10rem;">Tanggal Tanggapan</label>:
                        {{ $pengaduan->tanggal_tanggapan ?? '-' }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        @if($pengaduan->path_foto)
                        <img src="{{ asset('storage/' . $pengaduan->path_foto) }}" alt="" style="max-width: 100%; border-radius: 10px;">
                        @else
                        <img src="{{ asset('img/noPhoto.jpg') }}" alt="" style="max-width: 70%">
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('pengaduan.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
            </div>
        </div>
    </div>
@endsection