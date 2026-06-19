@extends('Admin.app')
@section('content')
<div class="card">
<div class="header">
            <h2 class="title">Edit Profile</h2>
        </div>
    <div class="content">
        <form method="POST" action="" enctype="multipart/form-data" id="myForm">
            @method('PUT')
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control" name="nama" value="{{$user->name}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{$user->email}}" required>
                </div>
            </div>
            <div class="col-md-12">
                <a class="btn btn-success btn-fill" href="/change_password">Change Password</a>
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
                <div class="alert alert-danger" id="successAlert">
                    {{ session()->get('failed') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
        </form>
    </div>
</div>
@endsection