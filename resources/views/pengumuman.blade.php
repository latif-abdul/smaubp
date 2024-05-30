@extends('app')
@section('content')
<main class="container" style="margin-top:200pt">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>Pengumuman</h1>
            <form method="POST" action="/pengumuman">
            @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" name="no_pendaftaran"
                        placeholder="Masukkan No Pendaftaran">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
            @if (isset($msg))
            <div class="alert alert-{{$color}}" role="alert">
                <h4 class="alert-heading">{{$st}}</h4>
                <p>{{$msg}}</p>
                <!-- <hr> -->
                <!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
            </div>
            @endif
        </div>
    </div>
</main>
@endsection