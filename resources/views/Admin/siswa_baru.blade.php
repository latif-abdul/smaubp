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
                                        <a class="btn btn-danger" href="/admin/siswa_baru/{{$santri->id}}/delete">Delete</a>
                                        <a class="btn" href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}">Kirim
                                            Whatsapp</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="alert alert-info d-none hide" id="successAlert" style="position:fixed">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                        <span id="messages_content">Your form has been submitted successfully!</span>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                        crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    var msg = '{{Session::get('success')}}';
    var exist = '{{Session::has('success')}}';
    if (exist) {
        $('#myForm').submit(function (e) {
            $('#successAlert').removeClass('hide').addClass('alert alert-success alert-dismissible').slideDown().show();
            $('#messages_content').html('<h4>'+msg+'</h4>');
            $('#modal').modal('show');
            e.preventDefault();
            await new Promise(r => setTimeout(r, 2000));
            $('#successAlert').remove();
        });
    }
</script>
@endsection