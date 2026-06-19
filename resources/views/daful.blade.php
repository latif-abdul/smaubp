@extends('app')
@section('content')
<div class="container">
    <form method="POST" action="{{$formAction}}" enctype="multipart/form-data">
        @csrf
        <div>
            <br><br><br><br>
            <h2>DAFTAR ULANG SISWA</h2>
            <br>
        </div>

        <div class="content">

            <!-- Data Santri -->
            <h4>Data Santri</h4>
            <input type="hidden" value="{{ $santri->id ?? $siswa->id ?? '' }}" name="id">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_pendaftaran">Nomor Pendaftaran</label>
                        <input type="text" id="no_pendaftaran" name="no_pendaftaran" class="form-control" value="{{ old('no_pendaftaran', $santri->no_pendaftaran ?? $siswa->no_pendaftaran ?? '') }}" required disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_wa">Nomor Whatsapp</label>
                        <input type="text" id="no_wa" name="no_wa" class="form-control" value="{{ old('no_wa', $santri->no_wa ?? $siswa->no_wa ?? '') }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $santri->nama_lengkap ?? $siswa->nama_lengkap ?? '') }}" required>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" id="nisn" name="nisn" class="form-control" value="{{ old('nisn', $santri->nisn ?? $siswa->nisn ?? '') }}">
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik', $santri->nik ?? $siswa->nik ?? '') }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nomor_kk">Nomor Kartu Keluarga</label>
                        <input type="text" id="nomor_kk" name="nomor_kk" class="form-control" value="{{ old('nomor_kk', $santri->nomor_kk ?? $siswa->nomor_kk ?? '') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $santri->email ?? $siswa->email ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="laki-laki" {{ (old('jenis_kelamin', $santri->jenis_kelamin ?? $siswa->jenis_kelamin ?? '') == 'laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ (old('jenis_kelamin', $santri->jenis_kelamin ?? $siswa->jenis_kelamin ?? '') == 'perempuan') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $santri->tempat_lahir ?? $siswa->tempat_lahir ?? '') }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $santri->tanggal_lahir ?? $siswa->tanggal_lahir ?? '') }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="anak_ke">Anak ke-</label>
                        <input type="number" id="anak_ke" name="anak_ke" class="form-control" value="{{ old('anak_ke', $santri->anak_ke ?? $siswa->anak_ke ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="jumlah_saudara">Jumlah Saudara</label>
                        <input type="number" id="jumlah_saudara" name="jumlah_saudara" class="form-control" value="{{ old('jumlah_saudara', $santri->jumlah_saudara ?? $siswa->jumlah_saudara ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tinggi_badan">Tinggi Badan (cm)</label>
                        <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" value="{{ old('tinggi_badan', $santri->tinggi_badan ?? $siswa->tinggi_badan ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="berat_badan">Berat Badan (kg)</label>
                        <input type="number" id="berat_badan" name="berat_badan" class="form-control" value="{{ old('berat_badan', $santri->berat_badan ?? $siswa->berat_badan ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                
                </div>
            </div>

            <hr>

            <!-- Alamat / Wilayah -->
            <h4>Alamat / Wilayah</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" class="form-control" required>{{ old('alamat', $santri->alamat ?? $siswa->alamat ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <select id="provinsi" name="provinsi" class="form-control" required>
                            <option code="" value="{{ old('provinsi', $santri->provinsi ?? $siswa->provinsi ?? 'Memuat...') }}">{{ old('provinsi', $santri->provinsi ?? $siswa->provinsi ?? 'Memuat...') }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kabupaten_kota">Kota / Kabupaten</label>
                        <select id="kabupaten_kota" name="kabupaten_kota" class="form-control" required>
                            <option code="" value="{{ old('kabupaten_kota', $santri->kabupaten_kota ?? $siswa->kabupaten_kota ?? 'Pilih provinsi dahulu') }}">{{ old('kabupaten_kota', $santri->kabupaten_kota ?? $siswa->kabupaten_kota ?? 'Pilih provinsi dahulu') }}</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" class="form-control" required>
                            <option code="" value="{{ old('kecamatan', $santri->kecamatan ?? $siswa->kecamatan ?? 'Pilih kota dahulu') }}">{{ old('kecamatan', $santri->kecamatan ?? $siswa->kecamatan ?? 'Pilih kota dahulu') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="desa">Kelurahan / Desa</label>
                        <select id="desa" name="desa" class="form-control" required>
                            <option code="" value="{{ old('desa', $santri->desa ?? $siswa->desa ?? 'Pilih kecamatan dahulu') }}">{{ old('desa', $santri->desa ?? $siswa->desa ?? 'Pilih kecamatan dahulu') }}</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <select id="dusun" name="dusun" class="form-control">
                            <option value="">{{ old('dusun', $santri->dusun ?? $siswa->dusun ?? 'Pilih kelurahan dahulu') }}</option>
                        </select>
                    </div>
                </div> -->
            </div>

            <hr>

            <!-- Data Orang Tua / Wali -->
            <h4>Data Orang Tua / Wali</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $santri->nama_ayah ?? $siswa->nama_ayah ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nik_ayah">NIK Ayah</label>
                        <input type="text" id="nik_ayah" name="nik_ayah" class="form-control" value="{{ old('nik_ayah', $santri->nik_ayah ?? $siswa->nik_ayah ?? '') }}">
                    </div>
                </div>

                <!-- replaced TTL Ayah single text with combined place + date -->
                @php
                    $ttlAyahRaw = old('ttl_ayah', $santri->ttl_ayah ?? $siswa->ttl_ayah ?? '');
                    $ttlAyahPlace = '';
                    $ttlAyahDate = '';
                    if ($ttlAyahRaw) {
                        $parts = explode(',', $ttlAyahRaw, 2);
                        $ttlAyahPlace = trim($parts[0]);
                        if (isset($parts[1])) $ttlAyahDate = trim($parts[1]);
                    }
                @endphp

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ttl_ayah">Tempat Tanggal Lahir Ayah</label>
                        <div class="input-group">
                            <input type="text" id="ttl_ayah_place" class="form-control" placeholder="Tempat lahir" value="{{ $ttlAyahPlace }}">
                            <input type="date" id="ttl_ayah_date" class="form-control" value="{{ $ttlAyahDate }}">
                            <input type="hidden" id="ttl_ayah" name="ttl_ayah" value="{{ $ttlAyahRaw }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nomor_hp_ayah">No. HP Ayah</label>
                        <input type="text" id="nomor_hp_ayah" name="nomor_hp_ayah" class="form-control" value="{{ old('nomor_hp_ayah', $santri->nomor_hp_ayah ?? $siswa->nomor_hp_ayah ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah', $santri->pekerjaan_ayah ?? $siswa->pekerjaan_ayah ?? '') }}">
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="penghasilan_ayah">Penghasilan Ayah *</label>
                    <select id="penghasilan_ayah" class="form-control" name="penghasilan_ayah" required>
                            <option value="0-1.000.000" {{ (old('penghasilan_ayah', $santri->penghasilan_ayah ?? $siswa->penghasilan_ayah ?? '') == "0-1.000.000") ? 'selected' : '' }}>0-1.000.000</option>
                            <option value="1.000.000-3.000.000" {{ (old('penghasilan_ayah', $santri->penghasilan_ayah ?? $siswa->penghasilan_ayah ?? '') == "1.000.000-3.000.000") ? 'selected' : '' }}>1.000.000-3.000.000
                            </option>
                            <option value="3.000.000-6.000.000" {{ (old('penghasilan_ayah', $santri->penghasilan_ayah ?? $siswa->penghasilan_ayah ?? '') == "3.000.000-6.000.000") ? 'selected' : '' }}>
                                3.000.000-6.000.000</option>
                            <option value="6.000.000-10.000.000" {{ (old('penghasilan_ayah', $santri->penghasilan_ayah ?? $siswa->penghasilan_ayah ?? '') == "6.000.000-10.000.000") ? 'selected' : '' }}>
                                6.000.000-10.000.000</option>
                            <option value=">10.000.000" {{ (old('penghasilan_ayah', $santri->penghasilan_ayah ?? $siswa->penghasilan_ayah ?? '') == ">10.000.000") ? 'selected' : '' }}>> 10.000.000
                            </option>
                        </select>
                  </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $santri->nama_ibu ?? $siswa->nama_ibu ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nik_ibu">NIK Ibu</label>
                        <input type="text" id="nik_ibu" name="nik_ibu" class="form-control" value="{{ old('nik_ibu', $santri->nik_ibu ?? $siswa->nik_ibu ?? '') }}">
                    </div>
                </div>

                <!-- replaced TTL Ibu single text with combined place + date -->
                @php
                    $ttlIbuRaw = old('ttl_ibu', $santri->ttl_ibu ?? $siswa->ttl_ibu ?? '');
                    $ttlIbuPlace = '';
                    $ttlIbuDate = '';
                    if ($ttlIbuRaw) {
                        $parts = explode(',', $ttlIbuRaw, 2);
                        $ttlIbuPlace = trim($parts[0]);
                        if (isset($parts[1])) $ttlIbuDate = trim($parts[1]);
                    }
                @endphp

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="ttl_ibu">Tempat Tanggal Lahir Ibu</label>
                        <div class="input-group">
                            <input type="text" id="ttl_ibu_place" class="form-control" placeholder="Tempat lahir" value="{{ $ttlIbuPlace }}">
                            <input type="date" id="ttl_ibu_date" class="form-control" value="{{ $ttlIbuDate }}">
                            <input type="hidden" id="ttl_ibu" name="ttl_ibu" value="{{ $ttlIbuRaw }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="nomor_hp_ibu">No. HP Ibu</label>
                        <input type="text" id="nomor_hp_ibu" name="nomor_hp_ibu" class="form-control" value="{{ old('nomor_hp_ibu', $santri->nomor_hp_ibu ?? $siswa->nomor_hp_ibu ?? '') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" value="{{ old('pekerjaan_ibu', $santri->pekerjaan_ibu ?? $siswa->pekerjaan_ibu ?? '') }}">
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="penghasilan_ibu">Penghasilan Ibu *</label>
                    <select id="penghasilan_ibu" class="form-control" name="penghasilan_ibu" required>
                            <option value="0-1.000.000" {{ (old('penghasilan_ibu', $santri->penghasilan_ibu ?? $siswa->penghasilan_ibu ?? '') == "0-1.000.000") ? 'selected' : '' }}>0-1.000.000</option>
                            <option value="1.000.000-3.000.000" {{ (old('penghasilan_ibu', $santri->penghasilan_ibu ?? $siswa->penghasilan_ibu ?? '') == "1.000.000-3.000.000") ? 'selected' : '' }}>1.000.000-3.000.000
                            </option>
                            <option value="3.000.000-6.000.000" {{ (old('penghasilan_ibu', $santri->penghasilan_ibu ?? $siswa->penghasilan_ibu ?? '') == "3.000.000-6.000.000") ? 'selected' : '' }}>
                                3.000.000-6.000.000</option>
                            <option value="6.000.000-10.000.000" {{ (old('penghasilan_ibu', $santri->penghasilan_ibu ?? $siswa->penghasilan_ibu ?? '') == "6.000.000-10.000.000") ? 'selected' : '' }}>
                                6.000.000-10.000.000</option>
                            <option value=">10.000.000" {{ (old('penghasilan_ibu', $santri->penghasilan_ibu ?? $siswa->penghasilan_ibu ?? '') == ">10.000.000") ? 'selected' : '' }}>> 10.000.000
                            </option>
                        </select>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat_ortu">Alamat Orang Tua</label>
                        <textarea id="alamat_ortu" name="alamat_ortu" class="form-control">{{ old('alamat_ortu', $santri->alamat_ortu ?? $siswa->alamat_ortu ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Asal Sekolah -->
            <h4>Asal Sekolah</h4>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control" value="{{ old('asal_sekolah', $santri->asal_sekolah ?? $siswa->asal_sekolah ?? '') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input type="number" id="tahun_lulus" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', $santri->tahun_lulus ?? $siswa->tahun_lulus ?? '') }}" placeholder="contoh: 2024">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="alamat_sekolah">Alamat Sekolah</label>
                        <textarea id="alamat_sekolah" name="alamat_sekolah" class="form-control">{{ old('alamat_sekolah', $santri->alamat_sekolah ?? $siswa->alamat_sekolah ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <hr>

            <!-- System / Misc -->
            <h4>System / File Uploads</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="file-field">
                        <label>Akta Kelahiran</label>
                        <input type="file" class="form-control" name="akta_kelahiran" accept="image/*,application/pdf">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="file-field">
                        <label>Kartu Keluarga</label>
                        <input type="file" class="form-control" name="kartu_keluarga" accept="image/*,application/pdf">
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-6">
                    <div class="file-field">
                        <label>Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_transfer" accept="image/*,application/pdf">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="file-field">
                        <label>Pas Foto berwarna</label>
                        <input type="file" class="form-control" name="foto" accept="image/*" required>
                    </div>
                </div>

            </div>

            <br>

            <button type="submit" class="btn btn-primary btn-fill">Simpan</button>

            @if (session()->has('success'))
                <div class="alert alert-success" id="successAlert">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger" id="errorAlert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </form>
</div>

<!-- JS: load wilayah lists from wilayah.id and populate dependent selects -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const alamat = document.getElementById('alamat');
    const alamatOrtu = document.getElementById('alamat_ortu');
    const alamatSekolah = document.getElementById('alamat_sekolah');

    alamat.value = "{{ $siswa->alamat ?? '' }}";
    alamatOrtu.value = "{{ $siswa->alamat_ortu ?? '' }}";
    alamatSekolah.value = "{{ $siswa->alamat_sekolah ?? '' }}";
})
document.addEventListener('DOMContentLoaded', function () {
    const provinsiEl = document.getElementById('provinsi');
    const kabupatenEl = document.getElementById('kabupaten_kota');
    const kecamatanEl = document.getElementById('kecamatan');
    const desaEl = document.getElementById('desa');
    // const dusunEl = document.getElementById('dusun');

    // proxy endpoint on this app that forwards requests to wilayah.id and adds CORS header
    const PROXY = '/wilayah/proxy?endpoint=';

    function fetchJSON(url) {
        return fetch(url).then(res => {
            if (!res.ok) throw new Error('Network response was not ok');
            return res.json();
        });
    }

    function ensureArray(d) {
        if (!d) return [];
        if (Array.isArray(d)) return d;
        if (Array.isArray(d.data)) return d.data;
        // handle object with numeric keys
        const numericKeys = Object.keys(d).filter(k => String(Number(k)) === k);
        if (numericKeys.length) return numericKeys.map(k => d[k]);
        // return first array value if exists
        for (const v of Object.values(d)) {
            if (Array.isArray(v)) return v;
        }
        return [];
    }

    // provinces
    fetchJSON(PROXY + encodeURIComponent('/provinces'))
        .then(raw => {
            const data = ensureArray(raw);
            provinsiEl.innerHTML = '<option code="" value="">Pilih Provinsi</option>';
            data.forEach(p => {
                const opt = document.createElement('option');
                opt.setAttribute('code', p.code ?? p.province_code ?? '');
                opt.value = p.name ?? p.nama ?? p.title ?? '';
                opt.text = p.name ?? p.nama ?? p.title ?? '';
                // mark selected if matches backend value
                if (opt.value == "{{ old('provinsi', $santri->provinsi ?? $siswa->provinsi ?? '') }}") opt.selected = true;
                provinsiEl.appendChild(opt);
            });
        })
        .catch(err => {
            provinsiEl.innerHTML = '<option code="" value="">Gagal memuat provinsi</option>';
            console.error(err);
        });

    provinsiEl.addEventListener('change', function () {
        const pid = this.options[this.selectedIndex].getAttribute('code');
        console.log(pid)
        kabupatenEl.innerHTML = '<option code="" value="">Memuat...</option>';
        kecamatanEl.innerHTML = '<option code="" value="">Pilih kota dahulu</option>';
        desaEl.innerHTML = '<option code="" value="">Pilih kecamatan dahulu</option>';
        // dusunEl.innerHTML = '<option code="" value="">Pilih kelurahan dahulu</option>';
        if (!pid) {
            kabupatenEl.innerHTML = '<option code="" value="">Pilih provinsi dahulu</option>';
            return;
        }
        fetchJSON(PROXY + encodeURIComponent('/regencies/' + pid))
            .then(raw => {
                const data = ensureArray(raw);
                kabupatenEl.innerHTML = '<option code="" value="">Pilih Kota / Kabupaten</option>';
                data.forEach(c => {
                    const opt = document.createElement('option');
                    opt.setAttribute('code', c.code ?? c.regency_code ?? '');
                    opt.value = c.name ?? c.nama ?? c.title ?? '';
                    opt.text = c.name ?? c.nama ?? c.title ?? '';
                    if (opt.value == "{{ old('kabupaten_kota', $santri->kabupaten_kota ?? $siswa->kabupaten_kota ?? '') }}") opt.selected = true;
                    kabupatenEl.appendChild(opt);
                });
            })
            .catch(err => {
                kabupatenEl.innerHTML = '<option code="" value="">Gagal memuat kota</option>';
                console.error(err);
            });
    });

    kabupatenEl.addEventListener('change', function () {
        const cid = this.options[this.selectedIndex].getAttribute('code');
        kecamatanEl.innerHTML = '<option code="" value="">Memuat...</option>';
        desaEl.innerHTML = '<option code="" value="">Pilih kecamatan dahulu</option>';
        // dusunEl.innerHTML = '<option code="" value="">Pilih kelurahan dahulu</option>';
        if (!cid) {
            kecamatanEl.innerHTML = '<option code="" value="">Pilih kota dahulu</option>';
            return;
        }
        fetchJSON(PROXY + encodeURIComponent('/districts/' + cid))
            .then(raw => {
                const data = ensureArray(raw);
                kecamatanEl.innerHTML = '<option code="" value="">Pilih Kecamatan</option>';
                data.forEach(k => {
                    const opt = document.createElement('option');
                    opt.setAttribute('code', k.code ?? k.district_code ?? '');
                    opt.value = k.name ?? k.district_name ?? k.name ?? '';
                    opt.text = k.name ?? k.nama ?? k.title ?? '';
                    if (opt.value == "{{ old('kecamatan', $santri->kecamatan ?? $siswa->kecamatan ?? '') }}") opt.selected = true;
                    kecamatanEl.appendChild(opt);
                });
            })
            .catch(err => {
                kecamatanEl.innerHTML = '<option value="">Gagal memuat kecamatan</option>';
                console.error(err);
            });
    });

    kecamatanEl.addEventListener('change', function () {
        console.log(this.value);
        const did = this.options[this.selectedIndex].getAttribute('code');
        desaEl.innerHTML = '<option code="" value="">Memuat...</option>';
        // dusunEl.innerHTML = '<option code="" value="">Pilih kelurahan dahulu</option>';
        if (!did) {
            desaEl.innerHTML = '<option code="" value="">Pilih kecamatan dahulu</option>';
            return;
        }
        fetchJSON(PROXY + encodeURIComponent('/villages/' + did))
            .then(raw => {
                const data = ensureArray(raw);
                desaEl.innerHTML = '<option value="">Pilih Kelurahan / Desa</option>';
                data.forEach(v => {
                    const opt = document.createElement('option');
                    opt.setAttribute('code', v.code ?? v.village_code ?? '');
                    opt.value = v.name ?? v.village_name ?? v.name ?? '';
                    opt.text = v.name ?? v.nama ?? v.title ?? '';
                    if (opt.value == "{{ old('desa', $santri->desa ?? $siswa->desa ?? '') }}") opt.selected = true;
                    desaEl.appendChild(opt);
                });
            })
            .catch(err => {
                desaEl.innerHTML = '<option code="" value="">Gagal memuat kelurahan</option>';
                console.error(err);
            });
    });

    // desaEl.addEventListener('change', function () {
    //     const vid = this.options[this.selectedIndex].getAttribute('code');
    //     dusunEl.innerHTML = '<option code="" value="">Memuat...</option>';
    //     if (!vid) {
    //         dusunEl.innerHTML = '<option code="" value="">Pilih kelurahan dahulu</option>';
    //         return;
    //     }
    //     fetchJSON(PROXY + encodeURIComponent('/dusuns/' + vid))
    //         .then(raw => {
    //             const data = ensureArray(raw);
    //             if (data.length === 0) {
    //                 dusunEl.innerHTML = '<option value="-">Tidak ada data dusun</option>';
    //                 return;
    //             }
    //             dusunEl.innerHTML = '<option value="">Pilih Dusun</option>';
    //             data.forEach(d => {
    //                 const opt = document.createElement('option');
    //                 opt.setAttribute('code', d.code ?? d.dusun_code ?? '');
    //                 opt.value = d.name ?? d.nama ?? d.title ?? '';
    //                 opt.text = d.name ?? d.nama ?? d.title ?? '';
    //                 if (opt.value == "{{ old('dusun', $santri->dusun ?? $siswa->dusun ?? '') }}") opt.selected = true;
    //                 dusunEl.appendChild(opt);
    //             });
    //         })
    //         .catch(err => {
    //             dusunEl.innerHTML = '<option value="">Tidak tersedia</option>';
    //             console.info('Dusun endpoint tidak tersedia atau gagal: ', err);
    //         });
    // });

    // combine TTL Ayah place + date into single hidden input named ttl_ayah
    (function () {
        const ttlPlace = document.getElementById('ttl_ayah_place');
        const ttlDate = document.getElementById('ttl_ayah_date');
        const ttlHidden = document.getElementById('ttl_ayah');
        if (!ttlPlace || !ttlDate || !ttlHidden) return;

        function updateTtlAyah() {
            const place = ttlPlace.value.trim();
            const date = ttlDate.value;
            if (place && date) {
                ttlHidden.value = place + ', ' + date;
            } else if (place) {
                ttlHidden.value = place;
            } else if (date) {
                ttlHidden.value = date;
            } else {
                ttlHidden.value = '';
            }
        }

        ttlPlace.addEventListener('input', updateTtlAyah);
        ttlDate.addEventListener('change', updateTtlAyah);

        // ensure value is updated before submit
        const formEl = document.querySelector('form');
        if (formEl) {
            formEl.addEventListener('submit', updateTtlAyah);
        }
    })();

    // combine TTL Ibu place + date into single hidden input named ttl_ibu
    (function () {
        const ttlPlace = document.getElementById('ttl_ibu_place');
        const ttlDate = document.getElementById('ttl_ibu_date');
        const ttlHidden = document.getElementById('ttl_ibu');
        if (!ttlPlace || !ttlDate || !ttlHidden) return;

        function updateTtlIbu() {
            const place = ttlPlace.value.trim();
            const date = ttlDate.value;
            if (place && date) {
                ttlHidden.value = place + ', ' + date;
            } else if (place) {
                ttlHidden.value = place;
            } else if (date) {
                ttlHidden.value = date;
            } else {
                ttlHidden.value = '';
            }
        }

        ttlPlace.addEventListener('input', updateTtlIbu);
        ttlDate.addEventListener('change', updateTtlIbu);

        const formEl = document.querySelector('form');
        if (formEl) {
            formEl.addEventListener('submit', updateTtlIbu);
        }
    })();
});
</script>

@endsection