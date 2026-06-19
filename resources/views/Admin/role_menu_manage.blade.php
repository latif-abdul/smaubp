@extends('Admin.app')
@section('content')
<div class="card">
    <form method="post" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
        @if(isset($menu)) @method('PUT') @else @method('POST') @endif
        @csrf
        <div class="header">
            <h2 class="title">Menu</h2>
        </div>
        <div class="content">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" class="form-control" name="name" required
                    value="{{{old('name', isset($menu->name) ? $menu->name : '')}}}">
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" class="form-control" name="url" required
                    value="{{{old('url', isset($menu->url) ? $menu->url : '')}}}">
            </div>

            @foreach ($role as $rl)
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$rl->id}}" name="role[]" id="flexCheckDefault" {{{old('role', isset($selectedRole) && in_array($rl->id, $selectedRole) ? 'checked' : '')}}}>
                <label class="form-check-label" for="flexCheckDefault">
                    {{$rl->name}}
                </label>
            </div>
            
            @endforeach


            <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            <a href="/admin/menu" class="btn btn-primary btn-fill">Kembali</a>
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
            <!-- <
             script>
                // const url = '{{$formAction}}';

                $('#myForm').on('submit', (function (e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        type: "{{{isset($menu) ? 'PUT' : 'POST'}}}",
                        url: '{{$formAction}}',
                        processData: false,
                        contentType: false,
                        // contentType: 'multipart/form-data',
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
        </div>
    </form>
</div>
@endsection