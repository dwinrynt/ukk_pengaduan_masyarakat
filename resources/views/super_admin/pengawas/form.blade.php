@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-white">
        <h3 class="card-title">Form Pengawas</h3>
    </div>
    <div class="card-body">
        <form action="{{ (isset($pengawas)) ? route('pengawas.update', [$pengawas->id]) : route('pengawas.store') }}" method="POST">
            @csrf
            @if (isset($pengawas))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama_petugas" id="nama_petugas" value="{{ isset($pengawas) ? $pengawas->nama_petugas : old('nama_petugas') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ isset($pengawas) ? $pengawas->user->email : old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Nomor Telephone</label>
                <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" value="{{ isset($pengawas) ? $pengawas->telp : old('telp') }}">
                @error('telp')
                <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if (!isset($pengawas))
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki laki">Laki laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @elseif (isset($pengawas))
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki laki" {{ isset($pengawas) ? ($pengawas->jenis_kelamin == 'laki laki' ? 'selected' : '') : (old('jenis_kelamin') == 'laki laki' ? 'selected' : '') }}>Laki laki</option>
                    <option value="perempuan" {{ isset($pengawas) ? ($pengawas->jenis_kelamin == 'perempuan' ? 'selected' : '') : (old('jenis_kelamin') == 'perempuan' ? 'selected' : '') }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @endif
            <div class="mb-3">
                <label for="status" class="form-label">Level</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="">Pilih Level</option>
                    <option value="admin" {{ isset($pengawas) ? ($pengawas->status == 'admin' ? 'selected' : '') : (old('status') == 'admin' ? 'selected' : '') }}>Admin</option>
                    <option value="petugas" {{ isset($pengawas) ? ($pengawas->status == 'petugas' ? 'selected' : '') : (old('status') == 'petugas' ? 'selected' : '') }}>Petugas</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @if (!isset($pengawas))
            <div class="mb-3">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> 
            @endif
            <div class="d-flex justify-content-between">
                <a href="{{ route('pengawas.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
                <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection