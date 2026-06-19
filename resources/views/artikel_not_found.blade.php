@extends('app')
@section('content')
@if (session()->has('failed'))

        {{ session()->get('failed') }}
        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->

@endif
@endsection