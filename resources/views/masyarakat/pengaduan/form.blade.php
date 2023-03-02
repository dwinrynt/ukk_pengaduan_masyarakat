@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Form Pengaduan</h3>
        </div>
        <div class="card-body">
            <form action="{{ (isset($pengaduan)) ? route('pengaduan.update', [$pengaduan->id]) : route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($pengaduan))
                    @method('PUT')
                @endif
                <input type="hidden" name="masyarakat_id" id="masyarakat_id" value="{{ auth()->user()->masyarakat->id }}">
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Nama Kategori</label>
                    <select class="form-control" name="kategori_id" id="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $list)
                            <option value="{{ $list->id }}" {{ isset($pengaduan) ? ($pengaduan->kategori_id == $list->id ? 'selected' : '') : (old('kategori_id') == $list->id ? 'selected' : '') }} class="text-dark">{{ $list->nama_kategori }}</option>
                        @endforeach
                        {{--  {{ $list->id == (old('kategori_id') || $pengaduan->kategori_id) ? 'selected' : '' }} --}}
                    </select>
                </div>
                <div class="mb-3">
                    <label for="laporan" class="form-label">Laporan</label>
                    <textarea class="form-control" name="laporan" id="laporan">{{ isset($pengaduan) ? $pengaduan->laporan : old('laporan') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="path_foto" class="form-label">Foto (Opsional)</label>
                    @if (empty($pengaduan->path_foto))
                        <input type="file" class="form-control" name="path_foto" id="path_foto" value="{{ isset($pengaduan) ? $pengaduan->path_foto : old('path_foto') }}">
                    @else
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <a href="{{ asset('storage/' . $pengaduan->path_foto) }}" class="btn text-white col-lg" data-fancybox="gallery{{ $pengaduan->id }}" style="background-color: green; border-radius: 5px;">Lihat Gambar</a>
                            <input type="file" class="form-control col-lg-10" name="path_foto" id="path_foto" value="{{ isset($pengaduan) ? $pengaduan->path_foto : old('path_foto') }}">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ isset($pengaduan) ? $pengaduan->tanggal_pengaduan : old('tanggal_pengaduan') }}">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengaduan.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
                    <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection