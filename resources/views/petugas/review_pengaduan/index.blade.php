@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between">
            <h3 class="card-title">Pengaduan Masyarakat</h3>
            @if (auth()->user()->role == 'admin')
            <div class="right d-flex justify-content-end">
                <form action="{{ route('export-excel') }}" class="p-0">
                    <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-in-down"></i> Export Data Pengajuan</button>
                </form>
            </div>
            @endif
        </div>
        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Verifikasi Pengaduan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table>
                      <table class="table text-center">
                          <thead class="text-white">
                              <tr>
                                  <td>No</td>
                                  <td>Nama</td>
                                  <td>Kategori</td>
                                  <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($verifikasi as $row)
                            <tr>
                                <td>{{ $loop->iteration }}. </td>
                                <td>{{ $row->masyarakat->nama }}</td>
                                <td> {{ $row->kategori->nama_kategori }}</td>
                                <td>
                                    <form action="{{ route('verifikasi-pengaduan', [$row->id]) }}" method="get">
                                        <input type="hidden" name="status" id="status" value="proses">
                                        <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 5px; font-weight: 500;">Verifikasi</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </table>
                </div>
              </div>
            </div>
          </div>
        {{-- modal --}}
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex gap-3 mb-3">
                    <button class="btn btn-sm btn-primary btnProses" style="border-radius: 5px; min-width: 5rem; font-weight: 500;">Proses</button>
                    <button class="btn btn-sm btnSelesai" style="border-radius: 5px; border-color: #198754; color:#198754; min-width: 5rem; font-weight: 500;">Selesai</button>
                </div>
                <span class="@if ((count($verifikasi) > 0)) text-danger @else text-grey @endif" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                    {{ (count($verifikasi)) }}<i class="bi bi-bell-fill"></i>
                </span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead class="text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama Kategori</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Tanggal Tanggapan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    {{-- pengaduan proses --}}
                    <tbody class="tableProses">
                        @foreach ($pengaduan as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->masyarakat->nama }}</td>
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
                                <a href="{{ route('review-pengaduan.show', [$row->id]) }}" class="btn btn-sm btn-primary" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Show</a>
                                <a href="{{ route('review-pengaduan.edit', [$row->id]) }}" class="btn btn-sm btn-success" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Review</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- pengaduan selesai --}}
                    <tbody class="tableSelesai" style="display: none;">
                        @foreach ($selesai as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->masyarakat->nama }}</td>
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
                                <a href="{{ route('review-pengaduan.show', [$row->id]) }}" class="btn btn-sm btn-primary" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Show</a>
                                <a href="{{ route('review-pengaduan.edit', [$row->id]) }}" class="btn btn-sm btn-success" style="border-radius: 5px; font-weight: 700; min-width: 5rem;">Review</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const btnProses = document.querySelector('.btnProses');
        const btnSelesai = document.querySelector('.btnSelesai');
        const tableProses = document.querySelector('.tableProses');
        const tableSelesai = document.querySelector('.tableSelesai');

        btnProses.addEventListener('click', function(){
            tableProses.style.display = 'contents';
            tableSelesai.style.display = 'none';
            btnProses.style.background = '#0d6efd';
            btnProses.style.color = '#fff';
            btnSelesai.style.background = 'unset';
            btnSelesai.style.color = '#198754';
            btnSelesai.style.borderColor = '#198754';
        })

        btnSelesai.addEventListener('click', function(){
            tableProses.style.display = 'none';
            tableSelesai.style.display = 'contents';
            btnSelesai.style.background = '#198754';
            btnSelesai.style.color = '#fff';
            btnProses.style.background = 'unset';
            btnProses.style.color = '#0d6efd';
            btnProses.style.borderColor = '#0d6efd';
        })
    </script>
@endpush