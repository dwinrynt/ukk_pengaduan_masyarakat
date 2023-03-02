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
                <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" value="{{ isset($pengawas) ? $pengawas->nama_petugas : old('nama_petugas') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ isset($pengawas) ? $pengawas->user->email : old('email') }}">
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Nomor Telephone</label>
                <input type="number" class="form-control" name="telp" id="telp" value="{{ isset($pengawas) ? $pengawas->telp : old('telp') }}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Level</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('pengawas.index') }}" class="btn" style="border-radius: 5px; background-color: grey; color: white; min-width: 5rem;">Back</a>
                <button type="submit" class="btn" style="border-radius: 5px; background-color: green; color: white; min-width: 5rem;">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection