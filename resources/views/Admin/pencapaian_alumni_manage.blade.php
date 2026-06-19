@extends('Admin.app')
@section('content')
<div class="card">
    <form method="post" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
        @if(isset($siswa)) @method('PUT') @else @method('POST') @endif
        @csrf
        <div class="header">
            <h2 class="title">PENDAFTARAN SANTRI</h2>
        </div>
        <div class="content">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" class="form-control" name="name" required
                    value="{{{old('name', isset($siswa->name) ? $siswa->name : '')}}}">
            </div>

            <div class="form-group">
                <label for="universitas">Universitas</label>
                <input type="text" id="universitas" class="form-control" name="universitas" required
                    value="{{{old('universitas', isset($siswa->universitas) ? $siswa->universitas : '')}}}">
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" id="prodi" class="form-control" name="prodi" required
                    value="{{{old('prodi', isset($siswa->prodi) ? $siswa->prodi : '')}}}">
            </div>

            <div class="form-group">
                <label for="perolehan_hafalan">Perolehan Hafalan</label>
                <input type="text" id="perolehan_hafalan" class="form-control" name="perolehan_hafalan" required
                    value="{{{old('perolehan_hafalan', isset($siswa->perolehan_hafalan) ? $siswa->perolehan_hafalan : '')}}}">
            </div>

            <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            <a href="/admin/pencapaian_alumni" class="btn btn-primary btn-fill">Kembali</a>
            @if (session()->has('success'))
                <div class="alert alert-success" id="successAlert">
                    {{ session()->get('success') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger" id="successAlert">
                    {{ session()->get('failed') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
            <!-- <
             script>
                // const url = '{{$formAction}}';

                $('#myForm').on('submit', (function (e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        type: "{{{isset($siswa) ? 'PUT' : 'POST'}}}",
                        url: '{{$formAction}}',
                        processData: false,
                        contentType: false,
                        // contentType: 'multipart/form-data',
                        cache: false,
                        data: formData,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                        },
                        success: function (data, status, xhr) {
                            if (xhr.status == 200) {
                                alert("Successfully sent to database");
                            }
                        }, error: function () {
                            alert("Could not send to database");
                        }
                    });
                }));
            </script> -->
        </div>
    </form>
</div>
@endsection