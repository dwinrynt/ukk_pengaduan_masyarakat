@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between">
            <h3 class="card-title">Pengaduan Masyarakat</h3>
            <a href="{{ route('pengaduan.create') }}" class="btn" style="border-radius: 5px; background-color: green; color: white;">Create</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->kategori->nama_kategori }}</td>
                            <td>
                                @if ($row->path_foto)
                                    <a href="{{ asset('storage/' . $row->path_foto) }}" data-fancybox="gallery{{ $row->id }}">
                                        <img src="{{ asset('storage/' . $row->path_foto) }}" alt=""
                                            style="object-fit: cover; width: 3rem; height: 3rem; box-shadow: 0 3px 6px #0000001c;" />
                                    </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @switch($row->status)
                                    @case($row->status == 'menunggu verifikasi')
                                        <div class="btn btn-sm" style="background-color: #FFC0C0; color: #AC3131; font-weight: 700; border-radius: 5px;">{{ strtoupper($row->status) }}</div>
                                        @break
                                    @case($row->status == 'proses')
                                        <div class="btn btn-sm" style="background-color: #0095ff4e; color: #1A3680; font-weight: 700; border-radius: 5px;">{{ strtoupper($row->status) }}</div>
                                        @break
                                    @case($row->status == 'selesai')
                                        <div class="btn btn-sm" style="background-color: #D9FCEB; color: #177553; font-weight: 700; border-radius: 5px;">{{ strtoupper($row->status) }}</div>
                                        @break
                                @endswitch
                            </td>
                            <td>{{ $row->tanggal_pengaduan }}</td>
                            <td>{{ $row->tanggal_tanggapan ?? '-' }}</td>
                            <td>
                                <a href="{{ route('pengaduan.show', [$row->id]) }}" class="btn btn-sm btn-primary" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Show</a>
                                @if($row->status == 'menunggu verifikasi')
                                    <a href="{{ route('pengaduan.edit', [$row->id]) }}" class="btn btn-sm btn-warning text-white" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Update</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection