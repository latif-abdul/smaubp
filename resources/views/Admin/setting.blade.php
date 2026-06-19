@extends('Admin.app')
@section('content')
<div class="card">
    <form method="post" action="/setting" enctype="multipart/form-data" id="myForm">
        @if(isset($slideshow)) @method('PUT') @else @method('POST') @endif
        @csrf
        <div class="header">
            <h2 class="title">Setting Slideshow</h2>
        </div>
        <div class="content" id="imageContainer">
            @foreach($slideshow as $ss)
                <div class="row" id="exist_{{$ss->id}}">
                    <input type="hidden" name="id[]" value="{{{old('text_1', isset($ss->id) ? $ss->id : '')}}}">
                    <div class="col-md-1">
                        @if(isset($ss->gambar))
                            <img src="/uploads/{{$ss->gambar}}" width="100%">
                        @endif
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <input type="file" class="form-control" name="image[]"
                                value="{{{old('text_1', isset($ss->gambar) ? $ss->gambar : '')}}}">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <input type="text" id="text1_1" class="form-control" name="text_1[]" required
                                value="{{{old('text_1', isset($ss->text_1) ? $ss->text_1 : '')}}}" placeholder="Text 1">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <input type="text" id="text1_1" class="form-control" name="text_2[]" required
                                value="{{{old('text_2', isset($ss->text_2) ? $ss->text_2 : '')}}}" placeholder="Text 2">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger" onclick="remove({{$ss->id}})">-</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-success" onclick="addImageField()" id="tambah">Tambah
                    Gambar</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            </div>
        </div>
        <hr>
    </form>
    <form method="post" action="/sambutan" enctype="multipart/form-data" id="myForm">
        @if(isset($sambutan)) @method('PUT') @else @method('POST') @endif
        @csrf
        <div class="header">
            <h2 class="title">Sambutan</h2>
        </div>
        <div class="content" id="sambutan">
            @foreach($sambutan as $ss)
                <div class="row" id="exist_{{$ss->id}}">
                    <input type="hidden" name="id[]" value="{{{old('text_1', isset($ss->id) ? $ss->id : '')}}}">
                    <div class="col-md-2">
                        @if(isset($ss->foto))
                            <img src="/uploads/{{$ss->foto}}" width="100%">
                        @endif
                        <div class="form-group mt-3">
                            <input type="file" class="form-control" name="foto[]" id="image"
                                value="{{{old('text_1', isset($ss->foto) ? $ss->gambar : '')}}}">
                        </div>
                    </div>
                    <div class="col-md">

                        <div class="form-group">
                            <input type="text" id="nama" class="form-control" name="nama[]" required
                                value="{{{old('nama', isset($ss->nama) ? $ss->nama : '')}}}" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" id="jabatan" class="form-control" name="jabatan[]" required
                                value="{{{old('jabatan', isset($ss->jabatan) ? $ss->jabatan : '')}}}" placeholder="Jabatan">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Sambutan" id="floatingTextarea2"
                                style="height: 100px" name="sambutan[]"
                                value="">{{{old('jabatan', isset($ss->sambutan) ? $ss->sambutan : '')}}}</textarea>
                            <label for="floatingTextarea2">Sambutan</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger" onclick="remove({{$ss->id}})">-</a>
                    </div>
                    <hr style="width:95%" ;>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="button" class="btn btn-success" onclick="addSambutan()" id="tambah">Tambah
                    Sambutan</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            </div>
        </div>
    </form>
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
</div>
<script>
    counter = 0;
    function addImageField() {
        // Get the container element for image fields
        var imageContainer = document.getElementById("imageContainer");

        var row = document.createElement("row");
        row.className = "row";
        row.id = "row_" + counter;
        counter++;
        // Create a new div element for the image field
        var colMd0 = document.createElement("div");
        colMd0.className = "col-md-1";
        var colMd = document.createElement("div");
        colMd.className = "col-md";
        var colMd2 = document.createElement("div");
        colMd2.className = "col-md";
        var colMd3 = document.createElement("div");
        colMd3.className = "col-md";
        var colMd4 = document.createElement("div");
        colMd4.className = "col-md-1";

        // Create an input element for the image name
        var formGroup = document.createElement("div");
        formGroup.className = "form-group";
        var formGroup2 = document.createElement("div");
        formGroup2.className = "form-group";
        var formGroup3 = document.createElement("div");
        formGroup3.className = "form-group";
        var input = document.createElement("input");
        input.type = "file";
        input.className = "form-control";
        input.placeholder = "Gambar";
        input.id = "image";
        input.required = true;
        input.name = "image[]";  // Use an array name to capture multiple activities

        var input2 = document.createElement("input");
        input2.type = "text";
        input2.className = "form-control";
        input2.placeholder = "Text 1";
        input2.id = "text_1";
        input2.required = true;
        input2.name = "text_1[]";  // Use an array name to capture multiple activities

        var input3 = document.createElement("input");
        input3.type = "text";
        input3.className = "form-control";
        input3.placeholder = "Text 2";
        input3.id = "text_2";
        input3.required = true;
        input3.name = "text_2[]";  // Use an array name to capture multiple activities

        var remove = document.createElement("button");
        remove.type = "button";
        remove.className = "btn btn-danger";
        remove.innerHTML = "-";
        remove.onclick = function () {
            imageContainer.removeChild(row);
        };
        // Add the label and input to the image field div
        formGroup.appendChild(input);
        formGroup2.appendChild(input2);
        formGroup3.appendChild(input3);

        colMd.appendChild(formGroup);
        colMd2.appendChild(formGroup2);
        colMd3.appendChild(formGroup3);
        colMd4.appendChild(remove);

        var inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "id[]";

        // Add the image field div to the container
        row.appendChild(inputId);
        row.appendChild(colMd0);
        row.appendChild(colMd);
        row.appendChild(colMd2);
        row.appendChild(colMd3);
        row.appendChild(colMd4);

        imageContainer.appendChild(row);
    }
    function removeLastImageField() {
        var imageContainer = document.getElementById("imageContainer");
        if (imageContainer.children.length > 1) {
            imageContainer.removeChild(imageContainer.lastChild);
        }
    }
    function remove(id) {
        $.ajax({
            type: "DELETE",
            url: '/setting/' + id,
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
            },
            success: function (data, status, xhr) {
                if (xhr.status == 200) {
                    document.getElementById("imageContainer").removeChild(document.getElementById("exist_" + id))
                }
            }, error: function () {
                alert("Could not send to database");
            }
        });
    }
    counter_sambutan = 0;
    function addSambutan() {
        // Get the container element for image fields
        var Container = document.getElementById("sambutan");

        var row = document.createElement("row");
        row.className = "row";
        row.id = "row_" + counter_sambutan;
        counter_sambutan++;
        // Create a new div element for the image field
        var colMd0 = document.createElement("div");
        colMd0.className = "col-md-2";
        var colMd = document.createElement("div");
        colMd.className = "col-md";
        var colMd1 = document.createElement("div");
        colMd1.className = "col-md-1";

        // Create an input element for the image name
        var formGroup = document.createElement("div");
        formGroup.className = "form-group";
        var formGroup2 = document.createElement("div");
        formGroup2.className = "form-group";
        var formGroup3 = document.createElement("div");
        formGroup3.className = "form-group";
        var formFloating = document.createElement("div");
        formFloating.className = "form-floating";
        var input = document.createElement("input");
        input.type = "file";
        input.className = "form-control";
        input.placeholder = "Foto";
        input.id = "image";
        input.required = true;
        input.name = "foto[]";  // Use an array name to capture multiple activities

        var input2 = document.createElement("input");
        input2.type = "text";
        input2.className = "form-control";
        input2.placeholder = "Nama";
        input2.id = "nama";
        input2.required = true;
        input2.name = "nama[]";  // Use an array name to capture multiple activities

        var input3 = document.createElement("input");
        input3.type = "text";
        input3.className = "form-control";
        input3.placeholder = "Jabatan";
        input3.id = "jabatan";
        input3.required = true;
        input3.name = "jabatan[]";  // Use an array name to capture multiple activities

        var textarea = document.createElement("textarea");
        textarea.type = "text";
        textarea.className = "form-control";
        textarea.placeholder = "sambutan";
        textarea.id = "floatingTextarea2";
        textarea.required = true;
        textarea.name = "sambutan[]";
        textarea.style = "height: 100px";

        var label = document.createElement("label");
        label.htmlFor = "floatingTextarea2";
        label.innerHTML = "Sambutan"

        var remove = document.createElement("button");
        remove.type = "button";
        remove.className = "btn btn-danger";
        remove.innerHTML = "-";
        remove.onclick = function () {
            Container.removeChild(row);
        };
        // Add the label and input to the image field div
        formGroup.appendChild(input);
        formGroup2.appendChild(input2);
        formGroup3.appendChild(input3);
        formFloating.appendChild(textarea);
        formFloating.appendChild(label);

        colMd0.appendChild(formGroup);
        colMd.appendChild(formGroup2);
        colMd.appendChild(formGroup3);
        colMd.appendChild(formFloating);
        colMd1.appendChild(remove);

        var inputId = document.createElement("input");
        inputId.type = "hidden";
        inputId.name = "id[]";

        var hr = document.createElement("hr");
        hr.style = "width:95%";

        // Add the image field div to the container
        row.appendChild(inputId);
        row.appendChild(colMd0);
        row.appendChild(colMd);
        row.appendChild(colMd1);
        row.appendChild(hr);

        Container.appendChild(row);
    }

    const uploadField = document.getElementById('image');
    console.log('success get element');

    // $(document).ready(function () {
    //     console.log('success get element');
    //     $("#image").change(function () {
    //         if (this.files[0].size > 2097152) {
    //             alert("File is too big!");
    //             this.value = "";
    //         }
    //         console.log('on change');
    //     });
    // });

    $(document).on("change", "#image", function () {
        if (this.files[0].size > 2097152) {
            alert("File is too big! (Max 2048 MB)");
            this.value = "";
        }
        console.log('on change');
    });
</script>
@endsection