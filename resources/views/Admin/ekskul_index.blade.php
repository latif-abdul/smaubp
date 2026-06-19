@extends('Admin.app')
@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ekstrakulikuler</h4>
                            </div>
                            <div class="container">
                                <a class="btn btn-info btn-fill" href="{{url('/ekskul/create')}}">Tambah</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                    	<th>Nama</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Dakota Rice</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    </div>
            </div>
</div>  
@endsection