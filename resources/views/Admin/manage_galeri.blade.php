@extends('Admin.app')
@section('content')
<div class="card">
    <div class="content">
        <form method="POST" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
            @if(isset($galeri)) @method('PUT') @else @method('POST') @endif
            @csrf
            <div class="row">
                <div class="col-md-2">
                    @if(isset($galeri))
                    <img src="{{{url('uploads/'.$galeri->gambar)}}}" width="100%">
                    @endif
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="prestasi">Name</label>
                        <input type="text" id="prestasi" class="form-control" name="prestasi"
                            value="{{{old('prestasi', isset($galeri->prestasi) ? $galeri->prestasi : '')}}}" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-fill" data-toggle="modal"
                data-target="#exampleModal">Simpan</button>
            <a href="/galeri" class="btn btn-primary btn-fill">Kembali</a>

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