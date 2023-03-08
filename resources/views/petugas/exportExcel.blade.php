<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="card">
        <div class="table-responsive">
          <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Nomor Handphone</th>
                  <th>Kategori</th>
                  <th>Laporan</th>
                  <th>Tanggapan</th>
                  <th>Tanggal Pengaduan</th>
                  <th>Tanggal Tanggapan</th>
                  <th>Pengawas</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($pengaduan as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->masyarakat->nama }}</td>
                <td>{{ $row->masyarakat->nik }}</td>
                <td>{{ $row->masyarakat->telp }}</td>
                <td>{{ $row->kategori->nama_kategori }}</td>
                <td>{{ $row->laporan }}</td>
                <td>{{ $row->tanggapan }}</td>
                <td>{{ $row->tanggal_pengaduan }}</td>
                <td>{{ $row->tanggal_tanggapan }}</td>
                <td>{{ $row->petugas->nama_petugas ?? '-' }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>