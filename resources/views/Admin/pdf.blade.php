<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Formulir Pendaftaran - {{ $siswa->nama_lengkap ?? '' }}</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    header { text-align: left; }
    header img { width: 100px; }
    .data-diri { margin-top: 20px; }
    p { display: block; margin-bottom: 5px; }
    .footer { text-align: right; margin-top: 20px; }
    .image1 { text-align: left; }
    .image2 { float: right; }
    .image_div { width: 100%; height: 100px; }
    .image_div1 { width: 600px; float: left; }
    .image_div2 { margin-left: 620px; }
    .green_line { background-color: green; width: 100%; height: 30px; }
    h2, h3 { color: green; }
    .foto { width: 113px; height: 151px; object-fit: cover; }
    table { width: 100%; border-collapse: collapse; margin-top: 6px; }
    td { vertical-align: top; padding: 4px 6px; }
    .section { margin-top: 12px; }
    .col-2 { width: 40%; }
    .col-3 { width: 60%; }
    .small { color: #555; font-size: 12px; }
  </style>
</head>

<body>
  <header>
    <div class="image_div">
      <div class="image_div1">
        @if(!empty($base64_logo))<img class="image1" src="{{ $base64_logo }}">@endif
      </div>
      <div class="image_div2">
        @if(!empty($base64_SQ))<img class="image2" src="{{ $base64_SQ }}">@endif
      </div>
    </div>
    <div class="green_line"></div>
    <h1>FORMULIR BUKTI PENDAFTARAN SANTRI</h1>
    <h2>SMA - MA Unggulan Berbasis Pesantren Amanatul Ummah</h2>
    <p>Jl. KH. Abdul Chalim, no.1 desa Kembangbelor Pacet Mojokerto</p>
    <p>0823-3657-6055 | officialsmaubp@gmail.com</p>
  </header>

  <section class="data-diri section">
    <h3>DATA SANTRI</h3>
    <table>
      <tr><td class="col-2"><strong>Nama lengkap</strong></td><td class="col-3">: {{ $siswa->nama_lengkap ?? '-' }}</td></tr>
      <tr><td><strong>Nomor pendaftaran</strong></td><td>: {{ $siswa->no_pendaftaran ?? '-' }}</td></tr>
      <tr><td><strong>No. WA / Telp</strong></td><td>: {{ $siswa->no_wa ?? $siswa->nomor_hp ?? '-' }}</td></tr>
      <tr><td><strong>Email</strong></td><td>: {{ $siswa->email ?? '-' }}</td></tr>
      <tr><td><strong>Jenis Kelamin</strong></td><td>: {{ $siswa->jenis_kelamin ?? '-' }}</td></tr>
      <tr><td><strong>NIK / NISN</strong></td><td>: {{ $siswa->nik ?? '-' }} / {{ $siswa->nisn ?? '-' }}</td></tr>
      <tr><td><strong>Tempat, tanggal lahir</strong></td>
          <td>: {{ $siswa->tempat_lahir ?? '-' }}, {{ $tanggal_lahir ?? ($siswa->tanggal_lahir ?? '-') }}</td></tr>
      <tr><td><strong>Anak ke / Jumlah Saudara</strong></td><td>: {{ $siswa->anak_ke ?? '-' }} / {{ $siswa->jumlah_saudara ?? '-' }}</td></tr>
      <tr><td><strong>Tinggi / Berat</strong></td><td>: {{ $siswa->tinggi_badan ?? '-' }} cm / {{ $siswa->berat_badan ?? '-' }} kg</td></tr>
      <tr><td><strong>Nomor KK</strong></td><td>: {{ $siswa->nomor_kk ?? '-' }}</td></tr>
      
    </table>
  </section>

  <section class="section">
    <h3>ALAMAT / WILAYAH</h3>
    <table>
      <tr><td class="col-2"><strong>Alamat Lengkap</strong></td><td class="col-3">: {{ $siswa->alamat ?? '-' }}</td></tr>
      <tr><td><strong>Provinsi</strong></td><td>: {{ $siswa->provinsi ?? '-' }}</td></tr>
      <tr><td><strong>Kabupaten / Kota</strong></td><td>: {{ $siswa->kabupaten_kota ?? '-' }}</td></tr>
      <tr><td><strong>Kecamatan</strong></td><td>: {{ $siswa->kecamatan ?? '-' }}</td></tr>
      <tr><td><strong>Kelurahan / Desa</strong></td><td>: {{ $siswa->desa ?? '-' }}</td></tr>
      <tr><td><strong>Alamat Orang Tua</strong></td><td>: {{ $siswa->alamat_ortu ?? '-' }}</td></tr>
    </table>
  </section>

  <section class="section">
    <h3>DATA ORANG TUA / WALI</h3>
    @php
      function split_ttl($raw){
        if(empty($raw)) return ['-',''];
        $parts = explode(',', $raw, 2);
        $place = trim($parts[0] ?? '-');
        $date = isset($parts[1]) ? ltrim($parts[1]) : '';
        return [$place, $date];
      }
      [$ayah_place, $ayah_date] = split_ttl($siswa->ttl_ayah ?? '');
      [$ibu_place, $ibu_date] = split_ttl($siswa->ttl_ibu ?? '');
    @endphp
    <table>
      <tr><td class="col-2"><strong>Nama Ayah</strong></td><td class="col-3">: {{ $siswa->nama_ayah ?? '-' }}</td></tr>
      <tr><td><strong>NIK Ayah</strong></td><td>: {{ $siswa->nik_ayah ?? '-' }}</td></tr>
      <tr><td><strong>Tempat Tanggal Lahir Ayah</strong></td><td>: {{ $ayah_place }}{{ $ayah_date ? ', '.$ayah_date : '' }}</td></tr>
      <tr><td><strong>No. HP Ayah</strong></td><td>: {{ $siswa->nomor_hp_ayah ?? '-' }}</td></tr>
      <tr><td><strong>Pekerjaan Ayah</strong></td><td>: {{ $siswa->pekerjaan_ayah ?? '-' }}</td></tr>
      <tr><td><strong>Penghasilan Ayah</strong></td><td>: {{ $siswa->penghasilan_ayah ?? '-' }}</td></tr>

      <tr><td class="col-2"><strong>Nama Ibu</strong></td><td class="col-3">: {{ $siswa->nama_ibu ?? '-' }}</td></tr>
      <tr><td><strong>NIK Ibu</strong></td><td>: {{ $siswa->nik_ibu ?? '-' }}</td></tr>
      <tr><td><strong>Tempat Tanggal Lahir Ibu</strong></td><td>: {{ $ibu_place }}{{ $ibu_date ? ', '.$ibu_date : '' }}</td></tr>
      <tr><td><strong>No. HP Ibu</strong></td><td>: {{ $siswa->nomor_hp_ibu ?? '-' }}</td></tr>
      <tr><td><strong>Pekerjaan Ibu</strong></td><td>: {{ $siswa->pekerjaan_ibu ?? '-' }}</td></tr>
      <tr><td><strong>Penghasilan Ibu</strong></td><td>: {{ $siswa->penghasilan_ibu ?? '-' }}</td></tr>
    </table>
  </section>

  <section class="section">
    <h3>ASAL SEKOLAH</h3>
    <table>
      <tr><td class="col-2"><strong>Asal Sekolah</strong></td><td class="col-3">: {{ $siswa->asal_sekolah ?? '-' }}</td></tr>
      <tr><td><strong>Tahun Lulus</strong></td><td>: {{ $siswa->tahun_lulus ?? '-' }}</td></tr>
      <tr><td><strong>Alamat Sekolah</strong></td><td>: {{ $siswa->alamat_sekolah ?? '-' }}</td></tr>
    </table>
  </section>

          @if(!empty($base64_foto))<img class="foto" src="{{ $base64_foto }}" alt="Foto">@else - @endif
 
  </section>

  <p class="footer">Mojokerto, {{ $today ?? date('d-m-Y') }}</p>

</body>

</html>