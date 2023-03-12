@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Profile</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $petugas->nama_petugas }}" disabled>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" name="telp" id="telp" value="{{ $petugas->telp }}" disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $petugas->jenis_kelamin }}" disabled>
            </div>
        </div>
    </div>
@endsection