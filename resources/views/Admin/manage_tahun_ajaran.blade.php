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
            @if(isset($tahunAjaran)) @method('PUT') @else @method('POST') @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tahun_ajaran">Tahun Ajaran *</label>
                                <input type="text" id="tahun_ajaran" class="form-control" name="tahun_ajaran"
                                    value="{{{old('tahun_ajaran', isset($tahunAjaran->tahun_ajaran) ? $tahunAjaran->tahun_ajaran : '')}}}"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-switch" style="font-size:15pt">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Status</label> -->
                                        <input type="hidden" name="status" value="inactive">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault" name="status" value="active" {{{old('tahun_ajaran', isset($tahunAjaran) && $tahunAjaran->status == 'active' ? 'checked' : '')}}}>
                                        
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary btn-fill" data-toggle="modal"
                                data-target="#exampleModal">Simpan</button>
                            <a href="{{url()->previous()}}" class="btn btn-primary btn-fill">Kembali</a>
                            <br>
                            <br>
                            <br>
                            <br>

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