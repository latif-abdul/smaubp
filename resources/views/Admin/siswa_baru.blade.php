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
                <div class="content">
                    <form method="POST" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <label for="tanggal_pengumuman">Tanggal Pengumuman *</label>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">

                                    <input type="date" id="tanggal_pengumuman" class="form-control"
                                        name="tanggal_pengumuman"
                                        value="{{{old('tanggal_pengumuman', isset($tanggal_pengumuman->tanggal_pengumuman) ? $tanggal_pengumuman->tanggal_pengumuman : '')}}}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
                            </div>
                        </div>
                    </form>
                    @if (session()->has('success'))
                        <div class="alert alert-success show" id="successAlert">
                            {{ session()->get('success') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif
                    <!-- <div class="table-responsive table-full-width">

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
                                            <a class="btn btn-primary" href="/admin/siswa_baru/{{$santri->id}}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="btn btn-danger" href="/admin/siswa_baru/{{$santri->id}}/delete"><i
                                                    class="fa-solid fa-trash"></i></a>
                                            <a class="btn" href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}"><i
                                                    class="fa-brands fa-whatsapp"></i></a>
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
                    </div> -->
                    <div class="header_wrap">
                        <div class="num_rows">

                            <div class="form-group"> <!--		Show Numbers Of Rows 		-->
                                <select class="form-control" name="state" id="maxRows">


                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                    <option value="100">100</option>
                                    <option value="5000">Show ALL Rows</option>
                                </select>

                            </div>
                        </div>
                        <div class="tb_search">
                            <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()"
                                placeholder="Search.." class="form-control">
                        </div>
                    </div>
                    <table class="table table-striped table-class" id="table-id">


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
                                        <a class="btn btn-primary" href="/admin/siswa_baru/{{$santri->id}}/edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-danger" href="/admin/siswa_baru/{{$santri->id}}/delete"><i
                                                class="fa-solid fa-trash"></i></a>
                                        <a class="btn" href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}"><i
                                                class="fa-brands fa-whatsapp"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--		Start Pagination -->
                    <!-- <div class='pagination-container'> -->
                    <nav>
                        <ul class="pagination">
                            <!--	Here the JS Function Will Add the Rows -->
                        </ul>
                    </nav>
                    <!-- </div> -->
                    <div class="rows_count">Showing 11 to 20 of 91 entries</div>

                    <!-- 		End of Container -->



                    <!--  Developed By Yasser Mas -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script>
    const url = '{{$formAction}}';
    $('#myForm').on('submit', (function (e) {
                    e.preventDefault();
                    let formData = new FormData(myForm);
                    $.ajax({
                        type: "PUT",
                        url: url,
                        processData: false,
                        contentType: false,
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
@endsection