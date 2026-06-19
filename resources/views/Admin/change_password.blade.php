@extends('Admin.app')
@section('content')
<div class="card">
<div class="header">
            <h2 class="title">Ubah Password</h2>
        </div>
    <div class="content">
        <form method="POST" action="" enctype="multipart/form-data" id="myForm">
            @method('PUT')
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="old_password">Password lama</label>
                    <input type="password" id="old_password" class="form-control" name="old_password" value="" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="new_password">Password baru</label>
                    <input type="password" id="new_password" class="form-control" name="new_password" value="" required>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success" id="successAlert">
                    {{ session()->get('success') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger show" id="successAlert">
                    {{ session()->get('failed') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
        </form>
    </div>
</div>
@endsection