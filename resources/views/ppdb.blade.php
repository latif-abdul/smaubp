@extends('app')
@section('content')
<div class="container detailArtikel">
    <h2>Pendaftaran Siswa Baru</h2>
</div>

<img src="images/pramuka.jpeg" alt="Img Artikel" class="imgArtikel">


<div class="container mainDetailArtikel">
    <div class="row">
        <div class="col-md-8">
            <h3>INFORMASI PENERIMAAN SANTRI BARU</h3>
            <h4>
                BIAYA PENDIDIKAN
            </h4>
            <ol>
                <li>Formulir pendaftaran Rp.450.000,-</li>
                <li>Sarana prasarana Rp.8.000.000,-</li>
                <li>Seragam Rp. 1.200.000,-</li>
                <li>SPP per bulan Rp.2.150.000,-</li>
            </ol>
            <hr>
            <h4>JADWAL PENERIMAAN SANTRI BARU</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Gelombang</th>
                        <th scope="col">Pendaftaran</th>
                        <th scope="col">Pelaksanaan Tes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($batch as $gelombang)
                    <tr>
                        <td>{{$gelombang->name}}</td>
                        <td>{{Carbon\Carbon::parse($gelombang->date_from)->isoFormat('D MMMM Y')}}-{{Carbon\Carbon::parse($gelombang->date_to)->isoFormat('D MMMM Y')}}</td>
                        <td>{{Carbon\Carbon::parse($gelombang->tanggal_tes)->isoFormat('D MMMM Y')}}</td>
                    </tr>
                    @endforeach
                    
                    <!-- <tr>
                        <td>Gelombang 2</td>
                        <td>20 Oktober 2024 - 1 Maret 2025</td>
                        <td>2 Maret 2025</td>
                    </tr>
                    <tr>
                        <td>Gelombang 3</td>
                        <td>3 Maret - 29 Juni 2025</td>
                        <td>29 Juni 2025</td>
                    </tr> -->
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" colspan="2" style="text-align:center">Jalur Masuk</th>
                    </tr>
                </thead>
                <tr>
                    <td>Tes Reguler</td>
                    <td>Prestasi</td>
                </tr>
                <tr>
                    <td>Mengikuti prosedur tes akademik dan wawancara</td>
                    <td>Menyertakan Sertifikat Juara lomba di bidang tahfidzul qur'an.<br>atau<br>Sertifikat lomba
                        akademik/non-akademik.</td>
                </tr>
            </table>
            <hr>
            <h4>AKTIVITAS HARIAN SANTRI</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">Waktu</th>
                        <th scope="col">Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>02.45-04.00</td>
                        <td>Sholat Lail</td>
                    </tr>
                    <tr>
                        <td>04.00-04.30</td>
                        <td>Sholat Shubuh</td>
                    </tr>
                    <tr>
                        <td>04.30-05.45</td>
                        <td>Pengajian Kitab</td>
                    </tr>
                    <tr>
                        <td>05.45-06.30</td>
                        <td>Bersih Diri dan Sarapan</td>
                    </tr>
                    <tr>
                        <td>06.30-07.30</td>
                        <td>Apel Pagi dan Istighotsah</td>
                    </tr>
                    <tr>
                        <td>07.30-12.10</td>
                        <td>Kegiatan Belajar Akademik Formal</td>
                    </tr>
                    <tr>
                        <td>12.10-12.30</td>
                        <td>Sholat Dzuhur</td>
                    </tr>
                    <tr>
                        <td>12.30-13.00</td>
                        <td>Makan Siang</td>
                    </tr>
                    <tr>
                        <td>13.00-14.30</td>
                        <td>Tidur Siang</td>
                    </tr>
                    <tr>
                        <td>14.00-15.00</td>
                        <td>Bersih Diri</td>
                    </tr>
                    <tr>
                        <td>15.00-15.30</td>
                        <td>Sholat Ashar Berjama'ah</td>
                    </tr>
                    <tr>
                        <td>15.00-17.00</td>
                        <td>Pembelajaran Mu'adalah</td>
                    </tr>
                    <tr>
                        <td>17.00-18.30</td>
                        <td>Pengajian Kitab Kuning dan Sholat Magrib</td>
                    </tr>
                    <tr>
                        <td>18.30-20.30</td>
                        <td>Pembelajaran Tahfidzul Qur'an dan Sholat Isya'</td>
                    </tr>
                    <tr>
                        <td>20.30-21.00</td>
                        <td>Makan Malam</td>
                    </tr>
                    <tr>
                        <td>21.00-22.00</td>
                        <td>Belajar Mandiri dan Daurah Malam</td>
                    </tr>
                    <tr>
                        <td>22.00-02.45</td>
                        <td>Istirahat Malam</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4 infoPenulis ">
            <div class="">
                <div class="shareArtikel mb-4">

                    <div class="containerIconShare">
                        <a href="/form" class="btn btn-primary mr-3">
                            <!-- <a href="https://bit.ly/44fRtwQ" class="btn btn-primary mr-3"> -->
                            Daftar
                        </a>

                        <a href="/pengumuman" class="btn btn-primary">
                            Pengumuman
                        </a>
                    </div>
                    <br>
                    <div class="containerIconShare">
                        <a href="/download_file?path=uploads%2FBrosur%202024%20SMAU%20BP%20Amanatul%20Ummah.pdf" class="btn btn-primary mr-3">
                            <!-- <a href="https://bit.ly/44fRtwQ" class="btn btn-primary mr-3"> -->
                            Download Brosur
                        </a>
                    </div>
                </div>

                <hr>

            </div>
        </div>

    </div>
</div>



<!-- sosmed icon -->
<div class="iconBox">
    <a href="" class="perIconBox wa">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="" class="perIconBox fb">
        <i class="fab fa-facebook-f"></i>
    </a>

    <a href="" class="perIconBox ig">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="" class="perIconBox yt">
        <i class="fab fa-youtube"></i>
    </a>

    <a href="" class="perIconBox linkin">
        <i class="fab fa-linkedin-in"></i>
    </a>
</div>
@endsection