@extends('Admin.app')
@section('content')
<div class="card">
    <div class="content">
        <form method="POST" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
            <!-- {{$formAction}} -->
            <!-- <div class="md-editor" id="1717708093069">
    <div class="md-header btn-toolbar"> -->
            <!-- <div class="btn-group"> -->
            <!-- <button class="btn-default btn-sm btn" type="button" title="Bold" tabindex="-1"
                data-provider="bootstrap-markdown" data-handler="bootstrap-markdown-cmdBold" data-hotkey="Ctrl+B"><span
                    class="glyphicon glyphicon-bold"></span> </button>
                    <button class="btn-default btn-sm btn"
                type="button" title="Italic" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdItalic" data-hotkey="Ctrl+I"><span
                    class="glyphicon glyphicon-italic"></span> </button>
                    <button class="btn-default btn-sm btn"
                type="button" title="Heading" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdHeading" data-hotkey="Ctrl+H"><span
                    class="glyphicon glyphicon-header"></span> </button>
                </div>
        <div class="btn-group">
            <button class="btn-default btn-sm btn" type="button" title="URL/Link" tabindex="-1"
                data-provider="bootstrap-markdown" data-handler="bootstrap-markdown-cmdUrl" data-hotkey="Ctrl+L"><span
                    class="glyphicon glyphicon-link"></span> </button>
                    <button class="btn-default btn-sm btn hidden"
                type="button" title="Image" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdImage" data-hotkey="Ctrl+G"><span
                    class="glyphicon glyphicon-picture"></span> </button>
                </div>
        <div class="btn-group">
            <button class="btn-default btn-sm btn" type="button" title="Unordered List" tabindex="-1"
                data-provider="bootstrap-markdown" data-handler="bootstrap-markdown-cmdList" data-hotkey="Ctrl+U"><span
                    class="glyphicon glyphicon-list"></span> </button>
                    <button class="btn-default btn-sm btn"
                type="button" title="Ordered List" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdListO" data-hotkey="Ctrl+O"><span
                    class="glyphicon glyphicon-th-list"></span> </button>
                    <button class="btn-default btn-sm btn"
                type="button" title="Code" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdCode" data-hotkey="Ctrl+K"><span
                    class="glyphicon glyphicon-console"></span> </button>
                    <button class="btn-default btn-sm btn"
                type="button" title="Quote" tabindex="-1" data-provider="bootstrap-markdown"
                data-handler="bootstrap-markdown-cmdQuote" data-hotkey="Ctrl+Q"><span
                    class="glyphicon glyphicon-comment"></span> </button>
                </div> -->
            <!-- <div class="btn-group"><button class="btn-default btn-sm btn open-modal" type="button" title="Help"
                tabindex="-1" data-provider="bootstrap-markdown" data-handler="bootstrap-markdown-cmdHelp"
                data-hotkey="Ctrl+F1" data-modal-title="Markdown Guide" href="submitticket.php?action=markdown"><span
                    class="fas fa-question-circle"></span> </button></div>
        <div class="md-controls"><a class="md-control md-control-fullscreen" href="#"><span
                    class="glyphicon glyphicon-fullscreen"></span></a></div> -->
            <!-- </div> -->
            @if(isset($artikel)) @method('PUT') @else @method('POST') @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul *</label>
                                <input type="text" id="judul" class="form-control" name="judul"
                                    value="{{{old('judul', isset($artikel->judul) ? $artikel->judul : '')}}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penulis">Penulis *</label>
                                <input type="text" id="penulis" class="form-control" name="penulis"
                                    value="{{{old('penulis', isset($artikel->penulis) ? $artikel->penulis : '')}}}"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="upload_dropZone text-center mb-3 p-4">

                    <legend class="visually-hidden">Image uploader</legend>

                    <svg class="upload_svg" width="60" height="60" aria-hidden="true">
                        <use href="#icon-imageUpload"></use>
                    </svg>

                    <p class="small my-2">Drag &amp; Drop background image(s) inside dashed region<br><i>or</i></p>

                    <input id="upload_image_background" data-post-name="image_background"
                        data-post-url="{{$formAction}}" class="position-absolute invisible" type="file" multiple
                        name="gambar[]" />

                    <label class="btn btn-info mb-3" style="color:white;" for="upload_image_background">Choose
                        file(s)</label>

                    <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0">
                        @isset($gambar)
                            <script>
                                const dataTransfer = new DataTransfer();
                            </script>
                            @foreach ($gambar as $img)
                                <img class="upload_img mt-2" alt="3.jpeg" src="{{url('/uploads/' . $img->gambar)}}">
                                <script>
                                    $(document).ready(function () {
                                        fetch("{{url('/uploads/' . $img->gambar)}}")
                                            .then((res) => {
                                                console.log(testPass)
                                                dataTransfer.items.add(res);
                                            })
                                            .catch((e) => console.error(e));
                                        // const myFile = new File('{{$img->gambar}}');
                                        // const reader = new FileReader();

                                        // // Now let's create a DataTransfer to get a FileList
                                        // const dataTransfer = new DataTransfer();

                                        // // fileInput.files = dataTransfer.files;

                                    });
                                </script>
                            @endforeach
                            <script>
                                handleFiles(dataTransfer);
                            </script>
                        @endisset
                    </div>

                </fieldset>
            </div>
            <!-- Create the editor container -->
            <input type="hidden" name="artikel"
                value="{{{old('artikel', isset($artikel->artikel) ? $artikel->artikel : '')}}}">
            <div id="editor" class="ql-editor">
                {!!old('artikel', isset($artikel->artikel) ? $artikel->artikel : '')!!}
                <!-- <p>tes</p> -->
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-fill" data-toggle="modal"
                data-target="#exampleModal">Simpan</button>
            <a href="{{url()->previous()}}" class="btn btn-primary btn-fill">Kembali</a>

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

            <!-- Include the Quill library -->
            <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

            <!-- Initialize Quill editor -->
            <script>
                const quill = new Quill('#editor', {
                    theme: 'snow'
                });

                const url = '{{$formAction}}';

                // $(document).ready(function () {
                //     quill.setContent("{{{old('artikel', isset($artikel->artikel) ? $artikel->artikel : '')}}}");
                // });
                quill.on('text-change', function (delta, oldDelta, source) {
                    document.querySelector("input[name='artikel']").value = quill.root.innerHTML;
                });

                //     $('#myForm').on('submit', (function (e) {
                //         e.preventDefault();
                //         let quillHtml = quill.root.innerHTML.trim();
                //         let quillText = quill.getText();
                //         let formData = new FormData(this);
                //         // let artikel = quillHtml;
                //         // let judul = document.getElementById("judul").value;
                //         // let penulis = document.getElementById("penulis").value;
                //         // let gambar = $('#gambar').prop('files')[0];
                //         // let _token = "{{ csrf_token() }}";

                //         formData.append('artikel', quillText);
                //         // formData.append('judul', judul);
                //         // formData.append('penulis', penulis);
                //         // formData.append('gambar', gambar);
                //         // formData.append('_token', _token);
                //         $.ajax({
                //             type: "{{{isset($artikel) ? 'PUT' : 'POST'}}}",
                //             url: url,
                //             processData: false,
                //             contentType: false,
                //             // contentType: 'multipart/form-data',
                //             cache: false,
                //             data: formData,
                //             // data: {
                //             //     _token: "{{ csrf_token() }}",
                //             //     artikel: quillHtml,
                //             //     judul: document.getElementById("judul").value,
                //             //     gambar: document.getElementById("gambar").files[0],
                //             //     penulis: document.getElementById("penulis").value,
                //             // },
                //             beforeSend: function (xhr) {
                //                 xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
                //             },
                //             success: function (data, status, xhr) {
                //                 if (xhr.status == 200) {
                //                     alert("Successfully sent to database");
                //                 }
                //             }, error: function () {
                //                 alert("Could not send to database");
                //             }
                //         });
                //     }));

            </script>
        </form>
    </div>
</div>
@endsection