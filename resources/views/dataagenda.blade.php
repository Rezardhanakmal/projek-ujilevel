@extends('welcome')

@section('main')
<!doctype html>
<html lang="en">

<head>

    <title>Data Agenda</title>
</head>

<body>

    <h1 class="text-center mb-4 mt-3">Tabel Data Agenda</h1>

    <div class="container">
            <a href="/tambahagenda" class="btn btn-dark mb-2">Tambah Data +</a>
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Mapel</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Jenis Pembelajaran</th>
                            <th scope="col">Link</th>
                            <th scope="col">Absen</th>
                            <th scope="col">Dokumentasi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Keterangan Guru</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Berakhir</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $row->teacher->teacher }}</td>
                            <td>{{ $row->mps->mps }}</td>
                            <td>{{ $row->materi }}</td>
                            <td>{{ $row->jp }}</td>
                            <td>{{ $row->link }}</td>
                            <td>{{ $row->absen_siswa }}</td>
                            <td>
                                <img src="{{ asset('gambar/'.$row->dokumentasi) }}" alt="" style="width:100px; height:100px;">
                            </td>
                            <td>{{ $row->kelazs->kelazs }}</td>
                            <td>{{ $row->absen_guru }}</td>
                            <td>{{ $row->jam_mulai }}</td>
                            <td>{{ $row->jam_berakhir }}</td>
                            <td>{{ $row->created_at->format('D M Y') }}</td>
                            <td>
                                <a href="/edit-agenda/{{ $row->id }}" class="btn btn-secondary">Edit</a>
                                <a href="/delete-agenda/{{ $row->id }}" class="btn btn-light">Hapus</a>                            
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
</body>

</html>
@endsection