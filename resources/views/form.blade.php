@extends('app')
@section('content')
<div class="container">
<div>
<form method="POST" action="/admin/siswa_baru" enctype="multipart/form-data">
@csrf
<div>
  <h2>PENDAFTARAN SANTRI</h2>
  </div>
  <!-- <p>SELAMAT DATANG CALON GENERASI SMART QUR'ANI !</p>
  
  <ol>
    <li>Silakan melakukan pembayaran formulir online sebesar Rp 400.000 ke rekening BSI (Bank Syariah Mandiri) 7073341967 a.n SITI MUSIRROH (SMAU BP AU PACET)</li>
    <li>Isikan data santri, upload bukti pembayaran dan berkas-berkas yang diperlukan.</li>
    <li>Submit formulir dan tunggu verifikasi admin.</li>
  </ol> -->
  <div class="content">
  <div class="form-group">
    <label for="email">Email *</label>
    <input type="email" id="email" class="form-control" name="email" required>
  </div>
  
  <div class="form-group">
    <label for="nama_lengkap">Nama Lengkap (kapital dan tanpa disingkat) *</label>
    <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap"  required>
  </div>
  
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin *</label><br>
    <input type="radio" id="OP" name="jenis_kelamin" value="laki-laki" required>
    <label for="OP">Laki-Laki</label>
    <input type="radio" id="OL" name="jenis_kelamin" value="perempuan"  required>
    <label for="OL">Perempuan</label>
  </div>
  
  <div class="row">
    <div class="col-md-6">
  <div class="form-group">
    <label for="tempat_lahir">Tempat Lahir *</label>
    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" required>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir *</label>
    <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
  </div>
  </div>
  </div>
  
  <div class="form-group">
    <label for="asal_sekolah">Asal Sekolah *</label>
    <input type="text" id="asal_sekolah" class="form-control" name="asal_sekolah" required>
  </div>
  
  <div class="form-group">
    <label for="alamat_sekolah">Alamat Sekolah *</label>
    <input type="text" id="alamat_sekolah" class="form-control" name="alamat_sekolah" required>
  </div>
  <div class="row">
    <div class="col-md-6">
  <div class="form-group">
    <label for="nama_ayah">Nama Ayah/ Wali *</label>
    <input type="text" id="nama_ayah" class="form-control" name="nama_ayah" required>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
    <label for="nama_ibu">Nama Ibu *</label>
    <input type="text" id="nama_ibu" class="form-control" name="nama_ibu" required>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="nomor_hp_ayah">Nomor HP Ayah/ Wali *</label>
    <input type="number" id="nomor_hp_ayah" class="form-control" name="nomor_hp_ayah" required>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
    <label for="nomor_hp_ibu">Nomor HP Ibu *</label>
    <input type="number" id="nomor_hp_ibu" class="form-control" name="nomor_hp_ibu" required>
  </div>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="pekerjaan_ayah">Pekerjaan Ayah/ Wali *</label>
    <input type="text" id="pekerjaan_ayah" class="form-control" name="pekerjaan_ayah" required>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="pekerjaan_ibu">Pekerjaan Ibu *</label>
    <input type="text" id="pekerjaan_ibu" class="form-control" name="pekerjaan_ibu" required>
</div>
</div>

</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="penghasilan_ayah">Penghasilan Ayah *</label>
<select id="penghasilan_ayah" class="form-control" name="penghasilan_ayah" required>
          <option value="0-1.000.000">0-1.000.000</option>
          <option value="1.000.000-3.000.000">1.000.000-3.000.000</option>
          <option value="3.000.000-6.000.000">3.000.000-6.000.000</option>
          <option value="6.000.000-10.000.000">6.000.000-10.000.000</option>
          <option value=">10.000.000">> 10.000.000</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
<div class="form-group">
<label for="penghasilan_ibu">Penghasilan Ibu *</label>
<select id="penghasilan_ibu" class="form-control" name="penghasilan_ibu" required>
          <option value="0-1.000.000">0-1.000.000</option>
          <option value="1.000.000-3.000.000">1.000.000-3.000.000</option>
          <option value="3.000.000-6.000.000">3.000.000-6.000.000</option>
          <option value="6.000.000-10.000.000">6.000.000-10.000.000</option>
          <option value=">10.000.000">> 10.000.000</option>
        </select>
        </div>
        </div>
        </div>
        <div class="form-group">
    <label for="jalur_masuk">Jalur Masuk *</label><br>
    <input type="radio" id="OP" name="jalur_masuk" value="reguler" required>
    <label for="OP">Reguler</label>
  </div>
  <div class="row">
                <div class="col-md-6">
                    <div class="file-field">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="file-field">
                        <label>Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran">
                    </div>
                </div>
            </div>
            <br>
            <div class="alert alert-success" id="successAlert" role="alert">
                Your form has been submitted successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
                const form = document.getElementById('myForm');
                const successAlert = document.getElementById('successAlert');

                form.addEventListener('submit', function (event) {
                    $('.alert').alert();
                    console.log('cek')
                });
            </script>
<button type="submit" class="btn btn-primary btn-fill">Simpan</button>
</div>
</form>
</div>
</div>
@endsection