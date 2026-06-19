@extends('Admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Siswa Baru</h4>
                </div>
                <div class="content">
                    <a class="btn btn-info btn-fill" href="/admin/siswa_baru/create">Tambah</a>
                    <!-- <a class="btn btn-info btn-fill" href="/batch">Gelombang Pendaftaran</a> -->
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
                        <div class="alert alert-success" id="successAlert">
                            {{ session()->get('success') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif
<div class="row">
    <div class="col-md">
                    <form method="post" action="{{$formAction2}}" enctype="multipart/form-data">


                        {{ csrf_field() }}
                        <label>Tambah Siswa</label><br>
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                        <a class=" btn btn-success" href="{{url('/template/template import siswa.xlsx')}}">Download Template</a>

                    </form>

                    @if (session()->has('success'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session()->get('success') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif
</div>
<div class="col-md">
                    <form method="post" action="{{$formAction3}}" enctype="multipart/form-data">


                        {{ csrf_field() }}
                        <label>Update Siswa Lolos</label><br>
                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                        <a class=" btn btn-success" href="{{url('/template/template import siswa.xlsx')}}">Download Template</a>

                    </form>

                    @if (session()->has('success'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session()->get('success') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif
                    </div>
</div>
                    <br>
                    <a class="btn btn-primary" href="{{url('/export_daful')}}">Export Data Daftar Ulang</a>
                    <br>
                    <br>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0"
                                role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Pendaftar Baru</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2"
                                role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Siswa lolos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1"
                                role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Daftar Ulang</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content pt-5" id="tab-content">
                        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel"
                            aria-labelledby="simple-tab-0">
                            <div class="header_wrap">
                                <!-- <br>
                                <div class="form-floating">
                                    <select class="form-select" id="filter-batch" aria-label="filter-batch"
                                        name="tahun_ajaran_id">
                                        <option value="all">All</option>
                                        @foreach ($batch as $ta)
                                            <option value="{{$ta->name}} {{$ta->tahun_ajaran}}">{{$ta->name}} {{$ta->tahun_ajaran}}</option>
                                        @endforeach
                                    </select>
                                    <label for="filter-batch">Batch</label>
                                </div>
                                <br>
                                <button class="btn btn-warning" onclick="FilterBatch('table-id', 'filter-batch', 'maxRows')">Filter</button>
                                <br>
                                <br> -->
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
                                    <input type="text" id="search_input_all"
                                        onkeyup="FilterkeyWord_all_table('table-id', 'search_input_all', 'maxRows')"
                                        placeholder="Search.." class="form-control">
                                </div>
                            </div>
                            <table class="table table-striped table-class" id="table-id">


                                <thead>
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <!-- <th>Batch</th> -->
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $santri)
                                        <tr>
                                            <td>{{$santri->no_pendaftaran}}</td>
                                            <td>{{$santri->nama_lengkap}}</td>
                                            <!-- <td>{{$santri->name}} {{$santri->tahun_ajaran}}</td> -->
                                            <td>
                                                <form method="POST" action="/admin/siswa_baru/{{$santri->id}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="btn btn-primary"
                                                        href="/admin/siswa_baru/{{$santri->id}}/edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                    <a class="btn btn-success"
                                                        href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}"><i
                                                            class="fa-brands fa-whatsapp"></i></a>
                                                    <a class="btn btn-info"
                                                        href="/admin/siswa_baru/downloadpdf/{{$santri->id}}"><i
                                                            class="fa-solid fa-file-arrow-down"></i></a>
                                                </form>
                                                <!-- <a class="btn btn-secondary" href="/admin/daful/{{$santri->id}}"><i
                                                                                                                class="fa-solid fa-eye"></i></a> -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <!--		Start Pagination -->
                            <!-- <div class='pagination-container'> -->
                            <nav>
                                <ul class="pagination" id="pagination">
                                    <!--	Here the JS Function Will Add the Rows -->
                                </ul>
                            </nav>
                            <!-- </div> -->
                            <div class="rows_count" id="rows_count">Showing 11 to 20 of 91 entries</div>

                            <!-- 		End of Container -->



                            <!--  Developed By Yasser Mas -->
                        </div>
                        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                            <div class="header_wrap">
                                <!-- <br>
                                <div class="form-floating">
                                    <select class="form-select" id="filter-batch" aria-label="filter-batch"
                                        name="tahun_ajaran_id">
                                        <option value="all">All</option>
                                        @foreach ($batch as $ta)
                                            <option value="{{$ta->name}} {{$ta->tahun_ajaran}}">{{$ta->name}} {{$ta->tahun_ajaran}}</option>
                                        @endforeach
                                    </select>
                                    <label for="filter-batch">Batch</label>
                                </div>
                                <br>
                                <button class="btn btn-warning" onclick="FilterBatch('table-id', 'filter-batch', 'maxRows')">Filter</button>
                                <br>
                                <br> -->
                                <div class="num_rows">
                                    <div class="form-group"> <!--		Show Numbers Of Rows 		-->
                                        <select class="form-control" name="state" id="maxRows-3">


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
                                    <input type="text" id="search_input_all_3"
                                        onkeyup="FilterkeyWord_all_table('table-id-3', 'search_input_all_3', 'maxRows-3')"
                                        placeholder="Search.." class="form-control">
                                </div>
                            </div>
                            <table class="table table-striped table-class" id="table-id-3">


                                <thead>
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <!-- <th>Batch</th> -->
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($lolos as $santri)
                                        <tr>
                                            <td>{{$santri->no_pendaftaran}}</td>
                                            <td>{{$santri->nama_lengkap}}</td>
                                            <!-- <td>{{$santri->name}} {{$santri->tahun_ajaran}}</td> -->
                                            <td>
                                                <form method="POST" action="/admin/siswa_baru/{{$santri->id}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="btn btn-primary"
                                                        href="/admin/siswa_baru/{{$santri->id}}/edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                    <a class="btn btn-success"
                                                        href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}"><i
                                                            class="fa-brands fa-whatsapp"></i></a>
                                                    <a class="btn btn-info"
                                                        href="/admin/siswa_baru/downloadpdf/{{$santri->id}}"><i
                                                            class="fa-solid fa-file-arrow-down"></i></a>
                                                </form>
                                                <!-- <a class="btn btn-secondary" href="/admin/daful/{{$santri->id}}"><i
                                                                                                                class="fa-solid fa-eye"></i></a> -->

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <!--		Start Pagination -->
                            <!-- <div class='pagination-container'> -->
                            <nav>
                                <ul class="pagination" id="pagination-3">
                                    <!--	Here the JS Function Will Add the Rows -->
                                </ul>
                            </nav>
                            <!-- </div> -->
                            <div class="rows_count" id="rows_count-3">Showing 11 to 20 of 91 entries</div>

                            <!-- 		End of Container -->



                            <!--  Developed By Yasser Mas -->
                            </div>
                        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                            <div class="header_wrap">
                                <!-- <br>
                                <div class="form-floating">
                                    <select class="form-select" id="filter-batch-2" aria-label="filter-batch"
                                        name="tahun_ajaran_id">
                                        <option value="all">All</option>
                                        @foreach ($batch as $ta)
                                            <option value="{{$ta->name}}">{{$ta->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="filter-batch">Batch</label>
                                </div>
                                <br>
                                <button class="btn btn-warning" onclick="FilterBatch('table-id-2', 'filter-batch-2', 'maxRows-2')">Filter</button>
                                <br> -->
                                <br>
                                <div class="num_rows">

                                    <div class="form-group"> <!--		Show Numbers Of Rows 		-->
                                        <select class="form-control" name="state" id="maxRows-2">


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
                                    <input type="text" id="search_input_all_2"
                                        onkeyup="FilterkeyWord_all_table('table-id-2', 'search_input_all_2', 'maxRows-2')"
                                        placeholder="Search.." class="form-control">
                                </div>
                            </div>
                            <table class="table table-striped table-class" id="table-id-2">


                                <thead>
                                    <th>No Pendaftaran</th>
                                    <th>Nama</th>
                                    <!-- <th>Batch</th> -->
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($daful as $santri)
                                        <tr>
                                            <td>{{$santri->no_pendaftaran}}</td>
                                            <td>{{$santri->nama_lengkap}}</td>
                                            <!-- <td>{{$santri->name}} {{$santri->tahun_ajaran}}</td> -->
                                            <td>
                                                <form method="POST" action="/admin/siswa_baru/{{$santri->id}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="btn btn-secondary" href="/admin/daful/{{$santri->id}}"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a class="btn btn-primary"
                                                        href="/admin/siswa_baru/{{$santri->id}}/edit"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                    <a class="btn btn-success"
                                                        href="/admin/siswa_baru/redirectToWhatsapp/{{$santri->id}}"><i
                                                            class="fa-brands fa-whatsapp"></i></a>
                                                    <a class="btn btn-info"
                                                        href="/admin/siswa_baru/downloadpdf/{{$santri->id}}"><i
                                                            class="fa-solid fa-file-arrow-down"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <!--		Start Pagination -->
                            <!-- <div class='pagination-container'> -->
                            <nav>
                                <ul class="pagination" id="pagination-2">
                                    <!--	Here the JS Function Will Add the Rows -->
                                </ul>
                            </nav>
                            <!-- </div> -->
                            <div class="rows_count" id="rows_count-2">Showing 11 to 20 of 91 entries</div>

                            <!-- 		End of Container -->



                            <!--  Developed By Yasser Mas -->
                        </div>
                        
                    </div>
                    <br>

                    @if (session()->has('delete'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session()->get('delete') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger" id="successAlert">
                            {{ session()->get('error') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" id="successAlert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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