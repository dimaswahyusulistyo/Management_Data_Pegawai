@extends('dimas-app.master')

@section('title', 'AdminLTE 3 | Daftar Status Pegawai')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Status Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Status Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Status Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="{{ url('/formstatuspegawai') }}" class="btn btn-primary mb-3">Tambah Status Pegawai</a>
              <table class="table table-bordered">
                <thead>
                  <?php $no=1; ?>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Status Pegawai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($statuspegawais as $statuspegawai)
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $statuspegawai->id }}</td>
                    <td>{{ $statuspegawai->statuspegawai }}</td>
                    <td>
                      <a href="{{ route('dimas-app.editstatuspegawai', $statuspegawai->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('dimas-app.destroypegawai', $statuspegawai->id) }}" method="post" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger delete-button">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  <?php $no++; ?>
                  @endforeach
                </tbody>
              </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('aditional-css')
    <link rel="stylesheet" href="path-to-aditional-css.css">
  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
@endpush

@push('aditional-js')
    <script src="path-to-aditional-script.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
@endpush

<script>
    // Menangkap klik tombol Hapus
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('click', (e) => {
            e.preventDefault();
            const confirmationMessage = e.target.getAttribute('data-confirm');
            if (confirm(confirmationMessage)) {
                // Jika pengguna mengonfirmasi, lanjutkan untuk menghapus data
                e.target.parentElement.submit();
            }
        });
    });
</script>