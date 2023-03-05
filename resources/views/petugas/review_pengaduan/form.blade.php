@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Form Pengaduan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('review-pengaduan.update', [$pengaduan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="petugas_id" id="petugas_id" value="{{ auth()->user()->petugas->id }}">
                <input type="hidden" name="status" id="status" value="selesai">
                <div class="mb-3">
                    <label for="masyarakat_id" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="masyarakat_id" id="masyarakat_id" value="{{ $pengaduan->masyarakat->nama }}" disabled>
                </div>
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
                    <a href="{{ asset('storage/' . $pengaduan->path_foto) }}" class="btn text-white" data-fancybox="gallery{{ $pengaduan->id }}" style="background-color: green; border-radius: 5px;"><i class="bi bi-image"></i> Lihat Gambar</a>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ $pengaduan->tanggal_pengaduan }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea name="tanggapan" id="tanggapan" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggal_tanggapan" class="form-label">Tanggal Tanggapan</label>
                    <input type="date" class="form-control" name="tanggal_tanggapan" id="tanggal_tanggapan">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('review-pengaduan.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
                    <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection