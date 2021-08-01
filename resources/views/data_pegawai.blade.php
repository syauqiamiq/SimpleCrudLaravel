<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Panel | Admin</title>
</head>

<body>
  <div class="container">
    <h1 class="mb-4 mt-4 text-center">Data Pegawai</h1>
    <div class="row">
      <div class="col-2 text-center">
        <a href="/addData" class="btn btn-success">Add Data</a>
      </div>
      <div class="col-10">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      <table class="table caption-top">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Photo</th>
            <th scope="col">Gender</th>
            <th scope="col">Phone</th>
            <th scope="col">Di Buat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $number = 1;
          @endphp
          @foreach ($data as $row) 
          <tr>
            <th scope="row">{{ $number++ }}</th>
            <td>{{ $row->nama }}</td>
            <td>
              <img src="{{ asset("foto/$row->id/$row->foto") }}" alt="" style="width: 40px; height: 40px; ">
            </td>
            <td>{{ $row->jeniskelamin }}</td>
            <td>0{{ $row->notelp }}</td>
            <td>{{ $row->created_at->format('D, d M Y') }}</td>
            <td>
              <a href="/update/{{ $row->id }}" class="btn btn-primary">Edit</a>
              <a href="#" class="btn btn-danger delete" data-nama="{{ $row->nama }}" data-id="{{ $row->id }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
<script>
  $('.delete').click(function(){
    var namaPegawai = $(this).attr('data-nama');
    var id = $(this).attr('data-id');
    swal({
      title: "Anda Yakin?",
      text: "Kamu yakin ingin menghapus data dengan nama "+namaPegawai+"",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete/"+id+"";
        swal("Data behasil di hapus", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus");
      }
    });
});
</script>
<script>
  toaster.success('success');
</script>
</html>