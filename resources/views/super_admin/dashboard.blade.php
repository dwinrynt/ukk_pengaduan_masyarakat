@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 my-2" style="background: linear-gradient(90deg, #EC2323, #8119D2); color:#fff;">
                <div class="d-flex justify-content-between">
                    <h5>Total User</h5>
                    <h5>{{ $user }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 my-2" style="background: linear-gradient(90deg, #EC2323, #8119D2); color:#fff;">
                <div class="d-flex justify-content-between">
                    <h5>Total Kategori</h5>
                    <h5>{{ $kategori }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 my-2" style="background: linear-gradient(90deg, #EC2323, #8119D2); color:#fff;">
                <div class="d-flex justify-content-between">
                    <h5>Total Pengaduan</h5>
                    <h5>{{ $pengaduanAll }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card my-2">
                <div class="card-header" style="background: linear-gradient(90deg, #EC2323, #8119D2)">
                    <h5 class="text-white">Total Pengaduan PerKategori</h5>
                </div>
                <div class="table-responsive table-borderless table-hover p-2">
                    <table class="table">
                        <tbody>
                            @foreach ($pengaduanKategori as $row)
                            <tr>
                                <td><h5>{{ $row->nama_kategori }}</h5></td>
                                <td><h5>{{ $row->jumlah }}</h5></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection