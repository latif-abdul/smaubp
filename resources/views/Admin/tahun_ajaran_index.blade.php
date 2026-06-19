@extends('Admin.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{$title}}</h4>
                </div>
                <div class="container">
                    <a href="{{$base_url}}/create" class="btn btn-info btn-fill">Tambah</a>
                </div>
                <div class="content">
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
                            <th>Tahun Ajaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($tahunAjaran as $ta)
                                <tr>
                                    <td>{{$ta->tahun_ajaran}}</td>
                                    <td>
                                        <!-- <div class="form-check form-switch" style="margin:auto">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault">
                                        </div> -->
                                        {{$ta->status}}
                                    </td>
                                    <td>

                                        <form method="POST" action="{{$base_url}}/{{$ta->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <a class="btn btn-primary" href="{{$base_url}}/{{$ta->id}}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button class="btn btn-danger" type="submit"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <!-- <a class="btn btn-danger" href="{{$base_url}}/{{$ta->id}}/delete"><i
                                                                class="fa-solid fa-trash"></i></a> -->
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
                        <div class="alert alert-danger show" id="successAlert">
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