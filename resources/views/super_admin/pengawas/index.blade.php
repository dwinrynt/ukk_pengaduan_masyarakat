@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between">
            <h3 class="card-title">Pengawas</h3>
            <a href="{{ route('pengawas.create') }}" class="btn" style="border-radius: 5px; background-color: green; color: white;">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengawas as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_petugas }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('pengawas.edit', [$row->id]) }}" class="btn btn-sm btn-primary" style="border-radius: 5px;font-weight: 700; min-width: 5rem;">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection