@extends('Admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Pencapaian Alumni</h4>
                </div>
                <div class="container">
                    <a class="btn btn-info btn-fill" href="/admin/pencapaian_alumni/create">Tambah</a>
                </div>
                <div class="content">
                    <form method="post" action="{{$formAction}}" enctype="multipart/form-data">


                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                        <a class=" btn btn-success" href="/template/Template pencapaian alumni.xlsx">Download
                            Template</a>

                    </form>

                    @if (session()->has('success'))
                        <div class="alert alert-success" id="successAlert">
                            {{ session()->get('success') }}
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                        </div>
                    @endif

                    <br>
                    <br>
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
                            <input type="text" id="search_input_all"
                                onkeyup="FilterkeyWord_all_table('table-id', 'search_input_all', 'maxRows')"
                                placeholder="Search.." class="form-control">
                        </div>
                    </div>
                    <table class="table table-striped table-class" id="table-id">


                        <thead>
                            <th>Nama</th>
                            <th>Universitas</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $santri)
                                <tr>
                                    <td>{{$santri->name}}</td>
                                    <td>{{$santri->universitas}}</td>
                                    <td>
                                        <form method="POST" action="/admin/pencapaian_alumni/{{$santri->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-primary"
                                                href="/admin/pencapaian_alumni/{{$santri->id}}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger"
                                                type="submit"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            </div>
        </div>
    </div>
</div>
</div>


@endsection