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
                    <select class="form-control @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $list)
                            <option value="{{ $list->id }}" {{ isset($pengaduan) ? ($pengaduan->kategori_id == $list->id ? 'selected' : '') : (old('kategori_id') == $list->id ? 'selected' : '') }} class="text-dark">{{ $list->nama_kategori }}</option>
                        @endforeach
                        @error('kategori_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label for="laporan" class="form-label">Laporan</label>
                    <textarea class="form-control @error('laporan') is-invalid @enderror" name="laporan" id="laporan">{{ isset($pengaduan) ? $pengaduan->laporan : old('laporan') }}</textarea>
                    @error('laporan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="path_foto" class="form-label">Foto (Opsional)</label>
                    @if (empty($pengaduan->path_foto))
                        <input type="file" class="form-control @error('path_foto') is-invalid @enderror" name="path_foto" id="path_foto" value="{{ isset($pengaduan) ? $pengaduan->path_foto : old('path_foto') }}">
                        @error('path_foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    @else
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <a href="{{ asset('storage/' . $pengaduan->path_foto) }}" class="btn text-white col-lg-2" data-fancybox="gallery{{ $pengaduan->id }}" style="background-color: green; border-radius: 5px;"><i class="bi bi-image"></i> Lihat Gambar</a>
                            <input type="file" class="form-control col-lg @error('path_foto') is-invalid @enderror" name="path_foto" id="path_foto" value="{{ isset($pengaduan) ? $pengaduan->path_foto : old('path_foto') }}">
                            @error('path_foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ isset($pengaduan) ? $pengaduan->alamat : old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_pengaduan" class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control @error('tanggal_pengaduan') is-invalid @enderror" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ isset($pengaduan) ? $pengaduan->tanggal_pengaduan : old('tanggal_pengaduan') }}">
                    @error('tanggal_pengaduan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pengaduan.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
                    <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection