@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Form Kategori</h3>
        </div>
        <div class="card-body">
            <form action="{{ (isset($kategori)) ? route('kategori.update', [$kategori->id]) : route('kategori.store') }}" method="POST">
                @csrf
                @if (isset($kategori))
                    @method('PUT')
                @endif
                <div class="mt-3 mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama_kategori" placeholder="Enter Category Name" value="{{ isset($kategori) ? $kategori->nama_kategori : old('nama_kategori') }}" required>
                    @error('nama_kategori')
                        <div class="invalid-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
            </form>
        </div>
    </div>
@endsection