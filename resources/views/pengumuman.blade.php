@extends('app')
@section('content')
<main class="container" style="margin-top:200pt">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>Pengumuman</h1>
            <form method="POST" action="/pengumuman">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" name="no_pendaftaran"
                        placeholder="Masukkan No Pendaftaran">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
            @if (isset($msg))
                <div class="alert alert-{{$color}}" role="alert">
                    <h4 class="alert-heading">{{$st}}</h4>
                    <p>{{$msg}}</p>
                    <!-- <hr> -->
                    <!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
                </div>
                @if($st == "Selamat")
                    <ol>
                        <strong>Waktu daftar ulang mulai 18 – 27 Juli 2026. </strong>
                        <br>
                        <br>
                        Rincian pembayaran:
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Putra</strong>
                                <ol>
                                    <li>Sarana Prasarana : Rp. 8.000.000,-</li>
                                    <li>Seragam : Rp. 1.400.000,-</li>
                                    <strong>TOTAL : Rp. 9.400.000,-</strong>
                                </ol>
                            </div>
                            <div class="col-md-6">
                                <strong>Putri</strong>
                                <ol>
                                    <li>Sarana Prasarana : Rp. 8.000.000,-</li>
                                    <li>Seragam : Rp. 1.300.000,-</li>
                                    <strong>TOTAL : Rp. 9.300.000,-</strong>
                                </ol>
                            </div>
                        </div>
                        <br>

                        <ol>
                            <li>Pembayaran tunai dilayani di kantor SMAU BP Amanatul Ummah, area Gedung GBI PP. Amanatul Ummah Pacet</li>
                            <li>Pembayaran transfer melalui rekening Bank Syari'ah Indonesia (BSI) 8080000139 atas nama PSB SMA MA BP AMANATUL UMMAH PACET</li>
                            <li>Bukti transfer dikirim melalui WhatsApp Ustadzah Dini 0858-5199-9088</li>
                            <li>Pembayaran biaya daftar ulang tidak bisa ditarik kembali</li>
                        </ol>
                        <br><br>

                        Peserta dimohon melengkapi berkas daftar ulang sebagai berikut;
                        <ol>
                            <li>Akta kelahiran</li>
                            <li>Kartu keluarga</li>
                            <!-- <li>Lembar Surat Keterangan Lulus (SKL) atau halaman biodata rapor</li> -->
                            <li>Bukti pembayaran daftar ulang</li>
                            <li>Pas Foto berwarna (foto informal pose sopan)</li>
                        </ol>
                    </ol>
                    <a href="/daful/{{ $id }}" class="btn btn-primary">Daftar Ulang</a>
                @endif
            @endif
        </div>
    </div>
</main>
@endsection
