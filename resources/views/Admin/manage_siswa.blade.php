@extends('Admin.app')
@section('content')
<div class="card">
    <form method="post" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
        @if(isset($siswa)) @method('PUT') @else @method('POST') @endif
        @csrf
        <div class="header">
            <h2 class="title">PENDAFTARAN SANTRI</h2>
        </div>
        <!-- <p>SELAMAT DATANG CALON GENERASI SMART QUR'ANI !</p>
  
  <ol>
    <li>Silakan melakukan pembayaran formulir online sebesar Rp 400.000 ke rekening BSI (Bank Syariah Mandiri) 7073341967 a.n SITI MUSIRROH (SMAU BP AU PACET)</li>
    <li>Isikan data santri, upload bukti pembayaran dan berkas-berkas yang diperlukan.</li>
    <li>Submit formulir dan tunggu verifikasi admin.</li>
  </ol> -->
        <div class="content">
            <div class="form-group">
                <label for="no_pendaftaran">No Pendaftaran *</label>
                <input type="text" id="no_pendaftaran" class="form-control" name="no_pendaftaran" required
                    value="{{{old('no_pendaftaran', isset($siswa->no_pendaftaran) ? $siswa->no_pendaftaran : '')}}}">
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" class="form-control" name="email" required
                    value="{{{old('email', isset($siswa->email) ? $siswa->email : '')}}}">
            </div>

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap (kapital dan tanpa disingkat) *</label>
                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap"
                    value="{{{old('nama_lengkap', isset($siswa->nama_lengkap) ? $siswa->nama_lengkap : '')}}}" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin *</label><br>
                <input type="radio" id="OP" name="jenis_kelamin" value="laki-laki" {{{old('jenis_kelamin', isset($siswa->jenis_kelamin) && $siswa->jenis_kelamin == "laki-laki" ? 'checked=' . '"' . 'checked' . '"' : '')}}} required>
                <label for="OP">Laki-Laki</label>
                <input type="radio" id="OL" name="jenis_kelamin" value="perempuan" {{{old('jenis_kelamin', isset($siswa->jenis_kelamin) && $siswa->jenis_kelamin == "perempuan" ? 'checked=' . '"' . 'checked' . '"' : '')}}} required>
                <label for="OL">Perempuan</label>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir *</label>
                        <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                            value="{{{old('tempat_lahir', isset($siswa->tempat_lahir) ? $siswa->tempat_lahir : '')}}}"
                            required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir *</label>
                        <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                            value="{{{old('tanggal_lahir', isset($siswa->tanggal_lahir) ? $siswa->tanggal_lahir : '')}}}"
                            required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah *</label>
                <input type="text" id="asal_sekolah" class="form-control" name="asal_sekolah"
                    value="{{{old('asal_sekolah', isset($siswa->asal_sekolah) ? $siswa->asal_sekolah : '')}}}" required>
            </div>

            <div class="form-group">
                <label for="alamat_sekolah">Alamat Sekolah *</label>
                <input type="text" id="alamat_sekolah" class="form-control" name="alamat_sekolah"
                    value="{{{old('alamat_sekolah', isset($siswa->alamat_sekolah) ? $siswa->alamat_sekolah : '')}}}"
                    required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah/ Wali *</label>
                        <input type="text" id="nama_ayah" class="form-control" name="nama_ayah"
                            value="{{{old('nama_ayah', isset($siswa->nama_ayah) ? $siswa->nama_ayah : '')}}}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu *</label>
                        <input type="text" id="nama_ibu" class="form-control" name="nama_ibu"
                            value="{{{old('nama_ibu', isset($siswa->nama_ibu) ? $siswa->nama_ibu : '')}}}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_hp_ayah">Nomor HP Ayah/ Wali *</label>
                        <input type="number" id="nomor_hp_ayah" class="form-control" name="nomor_hp_ayah"
                            value="{{{old('nomor_hp_ayah', isset($siswa->nomor_hp_ayah) ? $siswa->nomor_hp_ayah : '')}}}"
                            required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomor_hp_ibu">Nomor HP Ibu *</label>
                        <input type="number" id="nomor_hp_ibu" class="form-control" name="nomor_hp_ibu"
                            value="{{{old('nomor_hp_ibu', isset($siswa->nomor_hp_ibu) ? $siswa->nomor_hp_ibu : '')}}}"
                            required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah/ Wali *</label>
                        <input type="text" id="pekerjaan_ayah" class="form-control" name="pekerjaan_ayah"
                            value="{{{old('pekerjaan_ayah', isset($siswa->pekerjaan_ayah) ? $siswa->pekerjaan_ayah : '')}}}"
                            required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu *</label>
                        <input type="text" id="pekerjaan_ibu" class="form-control" name="pekerjaan_ibu"
                            value="{{{old('pekerjaan_ibu', isset($siswa->pekerjaan_ibu) ? $siswa->pekerjaan_ibu : '')}}}"
                            required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah *</label>
                        <select id="penghasilan_ayah" class="form-control" name="penghasilan_ayah" required>
                            <option value="0-1.000.000" {{{old('penghasilan_ayah', isset($siswa->penghasilan_ayah) && $siswa->penghasilan_ayah == "0-1.000.000" ? 'selected' : '')}}}>0-1.000.000</option>
                            <option value="1.000.000-3.000.000" {{{old('penghasilan_ayah', isset($siswa->penghasilan_ayah) && $siswa->penghasilan_ayah == "1.000.000-3.000.000" ? 'selected' : '')}}}>1.000.000-3.000.000
                            </option>
                            <option value="3.000.000-6.000.000" {{{old('penghasilan_ayah', isset($siswa->penghasilan_ayah) && $siswa->penghasilan_ayah == "3.000.000-6.000.000" ? 'selected' : '')}}}>
                                3.000.000-6.000.000</option>
                            <option value="6.000.000-10.000.000" {{{old('penghasilan_ayah', isset($siswa->penghasilan_ayah) && $siswa->penghasilan_ayah == "6.000.000-10.000.000" ? 'selected' : '')}}}>
                                6.000.000-10.000.000</option>
                            <option value=">10.000.000" {{{old('penghasilan_ayah', isset($siswa->penghasilan_ayah) && $siswa->penghasilan_ayah == ">10.000.000" ? 'selected' : '')}}}>> 10.000.000
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu *</label>
                        <select id="penghasilan_ibu" class="form-control" name="penghasilan_ibu" required>
                            <option value="0-1.000.000" {{{old('penghasilan_ibu', isset($siswa->penghasilan_ibu) && $siswa->penghasilan_ibu == "0-1.000.000" ? 'selected' : '')}}}>0-1.000.000</option>
                            <option value="1.000.000-3.000.000" {{{old('penghasilan_ibu', isset($siswa->penghasilan_ibu) && $siswa->penghasilan_ibu == "1.000.000-3.000.000" ? 'selected' : '')}}}>
                                1.000.000-3.000.000
                            </option>
                            <option value="3.000.000-6.000.000" {{{old('penghasilan_ibu', isset($siswa->penghasilan_ibu) && $siswa->penghasilan_ibu == "3.000.000-6.000.000" ? 'selected' : '')}}}>
                                3.000.000-6.000.000</option>
                            <option value="6.000.000-10.000.000" {{{old('penghasilan_ibu', isset($siswa->penghasilan_ibu) && $siswa->penghasilan_ibu == "6.000.000-10.000.000" ? 'selected' : '')}}}>
                                6.000.000-10.000.000</option>
                            <option value=">10.000.000" {{{old('penghasilan_ibu', isset($siswa->penghasilan_ibu) && $siswa->penghasilan_ibu == ">10.000.000" ? 'selected' : '')}}}>> 10.000.000</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jalur_masuk">Jalur Masuk *</label><br>
                <input type="radio" id="OP" name="jalur_masuk" value="reguler" {{{old('jalur_masuk', isset($siswa->jalur_masuk) && $siswa->jalur_masuk == "reguler" ? 'checked=' . '"' . 'checked' . '"' : '')}}} required>
                <label for="OP">Reguler</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md">
                            @if(isset($siswa->foto))
                                <img src="/uploads/{{$siswa->foto}}" width="80%">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md">
                            @if(isset($siswa->bukti_pembayaran))
                                <img src="/uploads/{{$siswa->bukti_pembayaran}}" width="80%">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Bukti Pembayaran</label>
                                <input type="file" class="form-control" name="bukti_pembayaran">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="status"
                    {{{old('status', isset($siswa->status) && $siswa->status == "1" ? 'checked' : '')}}}>
                <label class="form-check-label" for="defaultCheck1">
                    Terverifikasi
                </label>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Saved</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
            <a href="/admin/siswa_baru" class="btn btn-primary btn-fill">Kembali</a>
            @if (session()->has('success'))
                <div class="alert alert-success show" id="successAlert">
                    {{ session()->get('success') }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
            @endif
            <!-- <script>
                // const url = '{{$formAction}}';

                $('#myForm').on('submit', (function (e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        type: "{{{isset($siswa) ? 'PUT' : 'POST'}}}",
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