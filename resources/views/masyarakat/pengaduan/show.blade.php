@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Form Pengaduan</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="kategori_id" id="kategori_id" value="{{ $pengaduan->kategori->nama_kategori }}" disabled>
            </div>
            <div class="mb-3">
                <label for="laporan" class="form-label">Laporan</label>
                <textarea class="form-control" name="laporan" id="laporan" disabled>{{ $pengaduan->laporan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="path-foto" class="form-label">Foto</label><br>
                <a href="{{ asset('storage/' . $pengaduan->path_foto) }}" class="btn text-white" data-fancybox="gallery{{ $pengaduan->id }}" style="background-color: green; border-radius: 5px;">Lihat Gambar</a>
            </div>
            <div class="mb-3">
                <label for="tanggapan" class="form-label">Tanggapan</label>
                <textarea name="tanggapan" id="tanggapan" class="form-control" disabled>{{ $pengaduan->tanggapan }}</textarea>
            </div>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ $pengaduan->tanggal_pengaduan }}" disabled>
                </div>
                <div class="col-lg-6">
                    <label for="tanggal_tanggapan" class="form-label">Tanggal Tanggapan</label>
                    <input type="date" class="form-control" name="tanggal_tanggapan" id="tanggal_tanggapan" value="{{ $pengaduan->tanggal_tanggapan }}" disabled>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('pengaduan.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
            </div>
        </div>
    </div>
@endsection