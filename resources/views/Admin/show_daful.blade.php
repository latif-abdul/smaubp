@extends('Admin.app')
@section('content')
@php
    $s = $daful->santri ?? ($santri ?? null);
@endphp

<div class="card">
    <form method="post" action="{{$formAction}}" enctype="multipart/form-data" id="myForm">
        @if(isset($daful)) @method('PUT') @else @method('POST') @endif
        @csrf

        <div class="header">
            <h2 class="title">DETAIL SANTRI & DAFTAR ULANG</h2>
        </div>

        <div class="content">
            <!-- Data Santri -->
            <h4>Data Santri</h4>
            <div class="row">
                <div class="col-md-4"><strong>Nomor Pendaftaran</strong><p>{{ $s->no_pendaftaran ?? '-' }}</p></div>
                <div class="col-md-4"><strong>Nama Lengkap</strong><p>{{ $s->nama_lengkap ?? '-' }}</p></div>
                <div class="col-md-4"><strong>Nomor WA</strong><p>{{ $s->no_wa ?? '-' }}</p></div>
            </div>

            <div class="row">
                <div class="col-md-3"><strong>Email</strong><p>{{ $s->email ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Jenis Kelamin</strong><p>{{ $s->jenis_kelamin ?? '-' }}</p></div>
                <div class="col-md-3"><strong>NIK</strong><p>{{ $s->nik ?? '-' }}</p></div>
                <div class="col-md-3"><strong>NISN</strong><p>{{ $s->nisn ?? '-' }}</p></div>
            </div>

            <div class="row">
                <div class="col-md-3"><strong>Tempat Lahir</strong><p>{{ $s->tempat_lahir ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Tanggal Lahir</strong><p>{{ $carbon::parse($s->tanggal_lahir)->isoFormat('D MMMM Y') ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Anak ke-</strong><p>{{ $s->anak_ke ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Jumlah Saudara</strong><p>{{ $s->jumlah_saudara ?? '-' }}</p></div>
            </div>

            <div class="row">
                <div class="col-md-3"><strong>Tinggi (cm)</strong><p>{{ $s->tinggi_badan ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Berat (kg)</strong><p>{{ $s->berat_badan ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Nomor KK</strong><p>{{ $s->nomor_kk ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Tahun Lulus</strong><p>{{ $s->tahun_lulus ?? '-' }}</p></div>
            </div>

            <hr>

            <!-- Alamat / Wilayah -->
            <h4>Alamat / Wilayah</h4>
            <div class="row">
                <div class="col-md-12"><strong>Alamat Lengkap</strong><p>{{ $s->alamat ?? '-' }}</p></div>
            </div>
            <div class="row">
                <div class="col-md-3"><strong>Provinsi</strong><p>{{ $s->provinsi ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Kabupaten / Kota</strong><p>{{ $s->kabupaten_kota ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Kecamatan</strong><p>{{ $s->kecamatan ?? '-' }}</p></div>
                <div class="col-md-3"><strong>Kelurahan / Desa</strong><p>{{ $s->desa ?? '-' }}</p></div>
            </div>

            <hr>

            <!-- Data Orang Tua -->
            <h4>Data Orang Tua / Wali</h4>

            @php
            use App\Http\Controllers\DafulController;
            @endphp

            <div class="row">
                <div class="col-md-4"><strong>Nama Ayah</strong><p>{{ $s->nama_ayah ?? '-' }}</p></div>
                <div class="col-md-3"><strong>NIK Ayah</strong><p>{{ $s->nik_ayah ?? '-' }}</p></div>
                <div class="col-md-5"><strong>Tempat Tanggal Lahir Ayah</strong><p>{{ (new DafulController)->format_ttl($s->ttl_ayah) }}</p></div>
            </div>
            <div class="row">
                <div class="col-md-3"><strong>No. HP Ayah</strong><p>{{ $s->nomor_hp_ayah ?? '-' }}</p></div>
                <div class="col-md-4"><strong>Pekerjaan Ayah</strong><p>{{ $s->pekerjaan_ayah ?? '-' }}</p></div>
                <div class="col-md-5"><strong>Penghasilan Ayah</strong><p>{{ $s->penghasilan_ayah ?? '-' }}</p></div>
            </div>

            <div class="row">
                <div class="col-md-4"><strong>Nama Ibu</strong><p>{{ $s->nama_ibu ?? '-' }}</p></div>
                <div class="col-md-3"><strong>NIK Ibu</strong><p>{{ $s->nik_ibu ?? '-' }}</p></div>
                <div class="col-md-5"><strong>Tempat Tanggal Lahir Ibu</strong><p>{{ (new DafulController)->format_ttl($s->ttl_ibu) }}</p></div>
            </div>
            <div class="row">
                <div class="col-md-3"><strong>No. HP Ibu</strong><p>{{ $s->nomor_hp_ibu ?? '-' }}</p></div>
                <div class="col-md-4"><strong>Pekerjaan Ibu</strong><p>{{ $s->pekerjaan_ibu ?? '-' }}</p></div>
                <div class="col-md-5"><strong>Penghasilan Ibu</strong><p>{{ $s->penghasilan_ibu ?? '-' }}</p></div>
            </div>

            <hr>

            <!-- Asal Sekolah -->
            <h4>Asal Sekolah</h4>
            <div class="row">
                <div class="col-md-6"><strong>Asal Sekolah</strong><p>{{ $s->asal_sekolah ?? '-' }}</p></div>
            </div>
            <div class="row">
                <div class="col-md-12"><strong>Alamat Sekolah</strong><p>{{ $s->alamat_sekolah ?? '-' }}</p></div>
            </div>

            <hr>

            <!-- Jalur & System -->
            <div class="row">
                <div class="col-md-6"><strong>Jalur Masuk</strong><p>{{ $s->jalur_masuk ?? '-' }}</p></div>
                <div class="col-md-6"><strong>Status Lulus</strong><p>{{ ($s->status_lulus ?? 0) ? 'Lolos' : 'Tidak Lolos' }}</p></div>
            </div>

            <hr>

            <!-- DAFUL files + verification checkboxes -->
            <h4>Berkas Daftar Ulang & Verifikasi</h4>

            @php
                $files = [
                    'akta_kelahiran' => 'Akta Kelahiran',
                    'kartu_keluarga' => 'Kartu Keluarga',
                    'foto' => 'Pas Foto',
                    'bukti_transfer' => 'Bukti Pembayaran (Daftar Ulang)',
                    'bukti_pembayaran' => 'Bukti Pembayaran (Pendaftaran)',
                    'sertifikat' => 'Sertifikat (Prestasi)'
                ];
                $verifKeys = [
                    'akta_kelahiran' => 'verifikasi_akta_kelahiran',
                    'kartu_keluarga' => 'verifikasi_kk',
                    'foto' => 'verifikasi_foto',
                    'bukti_transfer' => 'verifikasi_bukti_transfer',
                    'bukti_pembayaran' => null,
                    'sertifikat' => null
                ];
            @endphp
            <div class="row mb-3">
            @foreach($files as $field => $label)
                
                    <div class="col-md-6">
                        <label><strong>{{ $label }}</strong></label>
                        <div class="row">
                            <div class="col-md-6">
                                @if(isset($daful) && !empty($daful->$field))
                                    <img src="/uploads/{{ $daful->$field }}" style="max-width:100%;height:auto">
                                @else
                                    <p class="text-muted">Tidak ada file</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- ensure 0 when unchecked --}}
                                    @if($verifKeys[$field])
                                    <input type="hidden" name="{{ $verifKeys[$field] }}" value="0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1"
                                            id="chk_{{ $field }}"
                                            name="{{ $verifKeys[$field] }}"
                                            {{ isset($daful) && ($daful->{$verifKeys[$field]} ?? '') == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="chk_{{ $field }}">Terverifikasi</label>
                                    </div>
                                    @endif
                                    @if(isset($daful) && !empty($daful->$field))
                                        <a class="btn btn-sm btn-success mt-2" href="/admin/daful/download/{{ $daful->$field }}">Download File</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>

            <hr>

            <div class="row align-items-center">

                <div class="col-md-8 text-right">
                    <button type="submit" class="btn btn-primary btn-fill">Simpan</button>
                    <a href="/admin/siswa_baru" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success mt-3" id="successAlert">{{ session('success') }}</div>
            @endif
            @if (session()->has('failed'))
                <div class="alert alert-danger mt-3" id="failedAlert">{{ session('failed') }}</div>
            @endif
        </div>
    </form>
</div>
@endsection