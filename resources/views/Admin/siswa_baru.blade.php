@extends('Admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Siswa Baru</h4>
                </div>
                <div class="container">
                    <a class="btn btn-info btn-fill" href="/admin/siswa_baru/create">Tambah</a>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>No Pendaftaran</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $santri)
                                <tr>
                                    <td>{{$santri->no_pendaftaran}}</td>
                                    <td>{{$santri->nama_lengkap}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/siswa_baru/{{$santri->id}}/edit">Edit</a>
                                        <a class="btn btn-danger"
                                            href="/admin/siswa_baru/{{$santri->id}}/delete">Delete</a>
                                        <a class="btn"
                                            href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}">Kirim Whatsapp</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection