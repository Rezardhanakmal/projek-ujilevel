@extends('welcome')

@section('main')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form Tambah Agenda</title>
</head>

<body>

    <h1 class="text-center mb-5">Input Data Agenda</h1>

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12">
                    <form action="/insertagenda" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                        <label class="form-label">Nama Guru</label>
                        <select name="teacher_id" id="teacher_id" class="form-select form-control">
                            <option selected value>Pilih Nama Guru</option>
                            @foreach ($tc as $row)
                            <option value="{{ $row->id }}">{{ $row->teacher }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Mata Pelajaran</label>
                        <select name="mps_id" id="mps_id" class="form-select form-control">
                            <option selected value>Pilih Nama Mapel</option>
                            @foreach ($mp as $row)
                            <option value="{{ $row->id }}">{{ $row->mps }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Materi</label>
                            <input type="text" name="materi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('materi')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Jenis Pembelajaran</label>
                                <select class="form-select" name="jp" aria-label="Default select example">
                                    <option selected>Pilih Jenis Pembelajaran</option>
                                    <option value="PJJ">PJJ</option>
                                    <option value="PTM">PTM</option>
                                  </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link Pembelajaran</label>
                            <input type="text" name="link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Absen Siswa</label>
                            <input type="text" name="absen_siswa" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('absen_siswa')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dokumentasi</label>
                            <input type="file" name="dokumentasi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('dokumentasi')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <select name="kelazs_id" id="kelazs_id" class="form-select form-control">
                            <option selected value>Pilih Nama Kelas</option>
                            @foreach ($kl as $row)
                            <option value="{{ $row->id }}">{{ $row->kelazs }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan Guru</label>
                            <input type="text" name="absen_guru" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('absen_guru')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Mulai</label>
                            <input type="text" name="jam_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('jam_mulai')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jam Berakhir</label>
                            <input type="text" name="jam_berakhir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('jam_berakhir')
                            <div class="text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
@endsection