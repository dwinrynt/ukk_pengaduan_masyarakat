@section('content')
    <h5 class="mb-3">Welcome, {{ $masyarakat->nama }}</h5>
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Profile</h3>
            {{-- <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                Change Password
            </button> --}}
        </div>
        {{-- modal --}}
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('change-password', [auth()->user()->id]) }}" method="GET">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" name="current_password" id="current_password">    
                    </div>  
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" name="password" id="password">    
                    </div>  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
                </div>
              </div>
            </div>
          </div> --}}
        {{-- modal --}}
        <div class="card-body">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $masyarakat->nama }}" disabled>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik" id="nik" value="{{ $masyarakat->nik }}" disabled>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" name="telp" id="telp" value="{{ $masyarakat->telp }}" disabled>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="{{ $masyarakat->jenis_kelamin }}" disabled>
            </div>
        </div>
    </div>
@endsection