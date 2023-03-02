@extends('layouts.app')
@section('content')
    @if (session()->has('success'))
    <div class="alert alert-success">
        <span>{{ session()->get('success') }}</span>
    </div>
    @endif
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between">
            <h3 class="card-title">Kategori Pengaduan</h3>
            <a href="{{ route('kategori.create') }}" class="btn" style="border-radius: 5px; background-color: green; color: white;">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_kategori }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', [$row->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger mb-1" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Delete</button>
                                </form>
                                <a href="{{ route('kategori.edit', [$row->id]) }}" class="btn btn-sm btn-warning text-white" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection