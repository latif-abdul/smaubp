@extends('app')
@section('content')
<main class="container" style="margin-top:200pt">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h1>Pengumuman</h1>
        <form action="#">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg" name="search" placeholder="Masukkan No Pendaftaran">
            <button type="submit" class="btn btn-primary px-4">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection