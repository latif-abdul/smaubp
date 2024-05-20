@extends('app')
@section('content')
<ul id="autoWidth" class="cs-hidden">
    <li class="item-a">
        <section class="slideshow">
            <img class="satu" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>TEAMWORK</h1>
                </div>

                <h3>Teamwork In Our Endeavours</h3>
            </div>
        </section>
    </li>

    <li class="item-a">
        <section class="slideshow">
            <img class="dua" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>humility</h1>
                </div>

                <h3>Humility In Our Accomplishments</h3>
            </div>
        </section>
    </li>

    <li class="item-a">
        <section class="slideshow">
            <img class="tiga" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>Respect</h1>
                </div>

                <h3>Respect For One Another</h3>
            </div>
        </section>
    </li>

    <li class="item-a">
        <section class="slideshow">
            <img class="empat" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>integrity</h1>
                </div>

                <h3>Integrity In Our Relationships</h3>
            </div>
        </section>
    </li>

    <li class="item-a">
        <section class="slideshow">
            <img class="lima" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>commitment</h1>
                </div>

                <h3>Commitment To The Work We Undertake</h3>
            </div>
        </section>
    </li>


    <li class="item-a">
        <section class="slideshow">
            <img class="enam" src="images/banner-shd.png" alt="Team Work">
            <div class="shadow"></div>
            <div class="container">
                <div class="mainText">
                    <div class="garis"></div>
                    <h3>Our Values</h3>
                    <h1>excellence</h1>
                </div>

                <h3>Excellence In Whatever We Do</h3>
            </div>
        </section>
    </li>

</ul>







<div class="sambutan container">
    <h1>WELCOME TO SMA-MAU BP</h1>
    <p>
        “SMA-MA Unggulan Berbasis Pesantren Amanatul Ummah dengan program unggulan “Tahfidzul Qur’an” menjamin murid
        muridnya menghafal Al Qur’an , lulus 100% berklasifisi “A”, serta lulusannya diterima di Perguruan Tinggi
        Favorit sesuai pilihannya, baik di dalam negeri maupun luar negeri. Proses pembelajaran menggunakan sistem yang
        kompetitif, penuh kejujuran, dan rasa percaya diri, dalam bentuk dauroh, try out, dan pembahasan tuntas.”

    </p>
</div>


<div class="kepsek" data-cues="slideInUp">
    <div class="container">
        <img src="{{ asset('images/darimun.jpeg') }}" alt="pendiri SMA-MAU Ummah" data-delay="2000ms">

        <div class="visiMisi">

            <!-- <div class="visi">
                    <h5>Our Vision</h5>
                    <h3>Terwujudnya manusia yang unggul, utuh dan berakhlakul karimah guna kemulyaan dan kejayaan Islam dan kaum muslimin , 
                        kemulyaan dan kejayaan seluruh bangsa Indonesia dan untuk terwujudnya cita cita luhur kemerdekaan
                        yaitu terwujudnya kesejahteraan dan tegaknya keadilan utamanya di negara Republik Indonesia.
                    </h3>
                </div> -->

            <div class="misi">
                <h5>Prof. Dr. KH. Asep Saifuddin Chalim, M.A</h5>
                <h6 class="text-secondary">Pengasuh Pondok Pesantren Amanatul Ummah</h6>
                <p>
                    <br>
                    “SMA-MA Unggulan Berbasis Pesantren Amanatul Ummah dengan program unggulan “Tahfidzul Qur’an”
                    menjamin murid muridnya menghafal Al Qur’an , lulus 100% berklasifisi “A”, serta lulusannya diterima
                    di
                    Perguruan Tinggi Favorit sesuai pilihannya, baik di dalam negeri maupun luar negeri. Proses
                    pembelajaran menggunakan sistem yang kompetitif, penuh kejujuran, dan rasa percaya diri, dalam
                    bentuk dauroh, try out, dan pembahasan tuntas.”
                </p>
            </div>

        </div>

    </div>
</div>

<br>

<div class="kepsek" data-cues="slideInUp">
    <div class="container">

        <div class="visiMisi">

            <div class="misi">
                <h5>Gus, H. Muhammad Ilyas, Lc. M.A</h5>
                <h6 class="text-secondary">Koordinator SMA-MAU BP Amanatul Ummah</h6>
                <p>
                    <br>
                    “SMA-MAU BP menerapkan pembelajaran yang berimbang antara Kurikulum Nasional, Kurikulum berstandar
                    Al Azhar, serta pembelajaran Tahfidzul Qur’an sebagai keunggulan dengan tujuan lulusan SMAU BP mampu
                    bersaing di bidang keilmuan Tingkat Nasional dan Internasional”
                </p>
            </div>

        </div>

        <img src="{{ asset('images/Gus Ilyas 2023.JPG') }}" alt="pendiri SMA-MAU Ummah" data-delay="5000ms">

    </div>
</div>


<!-- jurusan -->
<div class="jurusan">
    <div class="container">
        <h2>Prestasi SMA-MAU BP Amanatul Ummah</h2>

        <div class="boxJurusan" data-cues="slideInRight">

            <div class="perBox">
                <img src="images/1.jpg" alt="RPL" data-delay="200ms">
                <!-- <h3>Rekayasa Perangkat Lunak</h3> -->
            </div>

            <div class="perBox">
                <img src="images/2.jpeg" alt="ATU" data-delay="200ms">
                <!-- <h3>Agribisnis Ternak Unggas</h3> -->
            </div>

            <div class="perBox">
                <img src="images/3.jpeg" alt="APHP" data-delay="200ms">
                <!-- <h3>Agribisnis Pengolahan Hasil Pangan</h3> -->
            </div>

            <div class="perBox">
                <img src="images/4.jpeg" alt="API" data-delay="200ms">
                <!-- <h3>Agribisnis Perikanan Ikan</h3> -->
            </div>

            <!-- <div class="perBox">
                    <img src="images/6.jpg" alt="AKUTANSI">
                    <h3>Akutansi Keuangan & Lembaga</h3>
                </div> -->


            <div class="perBox">
                <img src="images/5.jpeg" alt="TKR">
                <!-- <h3>Teknik Kendaraan Ringan</h3> -->
            </div>

        </div>
    </div>
</div>



<section
    class="elementor-section elementor-top-section elementor-element elementor-element-dcd0ec2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="dcd0ec2" data-element_type="section">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-226d511"
            data-id="226d511" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-adb73b8 animated-slow elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="adb73b8" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">
                            Jadwal <strong>Pendaftaran & Tes Seleksi</strong>
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-7dfe70b elementor-widget elementor-widget-text-editor"
                    data-id="7dfe70b" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <em>* jadwal dapat berubah menyesuaikan kebijakan yayasan</em>
                    </div>
                </div>
                <div class="elementor-element elementor-element-b0445fe animated-slow elementor-invisible elementor-widget elementor-widget-text-editor"
                    data-id="b0445fe" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <p>
                        <table id="tablepress-1" class="tablepress tablepress-id-1">
                            <thead>
                                <tr class="row-1 odd">
                                    <th class="column-1">Jadwal</th>
                                    <!-- <th class="column2">Jalur Prestasi</th> -->
                                    <th class="column-3">Tes Tulis Gel. 1</th>
                                    <th class="column-4">Tes Tulis Gel. 2</th>
                                    <th class="column-5">Tes Tulis Gel. 3</th>
                                </tr>
                            </thead>
                            <tbody class="row-hover">
                                <tr class="row-2 even">
                                    <td class="column-1">
                                        <strong>Waktu Pendaftaran</strong>
                                    </td>
                                    <!-- <td class="column-2">Coming Soon</td> -->
                                    <td class="column-3">1 Agustus &#8211;23 Desember 2023</td>
                                    <td class="column-4">25 Desember 2023 &#8211;16 Maret 2024</td>
                                    <td class="column-5">25 Maret &#8211;26 Mei 2024</td>
                                </tr>
                                <tr class="row-3 odd">
                                    <td class="column-1">
                                        <strong>Pelaksanaan Ujian</strong>
                                    </td>
                                    <!-- <td class="column-2">Coming Soon</td> -->
                                    <td class="column-3">24 Desember 2023</td>
                                    <td class="column-4">17 Maret 2024</td>
                                    <td class="column-5">26 Mei 2024</td>
                                </tr>
                                <!-- <tr class="row-4 even">
                                                                            <td class="column-1">
                                                                                <strong>Pengumuman Hasil Tes</strong>
                                                                            </td>
                                                                            <td class="column-2">H+7 Tanggal Tes</td>
                                                                            <td class="column-3">H+7 Tanggal Tes</td>
                                                                            <td class="column-4">H+7 Tanggal Tes</td>
                                                                            <td class="column-5">H+7 Tanggal Tes</td>
                                                                        </tr> -->
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="containerArtikelHome container" data-cues="slideInUp">
    <h2>Artikel Terbaru</h2>

    <div class="artikelHome">


        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="220ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>

        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="240ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>


        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="260ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>


        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="280ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus
                    explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>


        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="300ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus
                    explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>


        <a class="perArtikelHome">
            <img src="images/1.jpg" alt="Foto Artikel" data-delay="320ms">
            <h3>Artikel</h3>
            <small>Di tulis oleh : <span>A</span></small>
            <p>
                <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus
                    explicabo
                    delectus quasi amet libero iusto sequi at. -->
            </p>
        </a>



    </div>
</div>





<!-- Counters -->
<section class="counter">

    <div class="counter-overlay">

        <div class="container wow bounceInLeft" data-wow-duration="1s">

            <div class="row text-center">

                <div class="col-md-3">

                    <div class="counter-item">

                        <div><i class="fa fa-cloud-download"></i></div>
                        <h2><span class="counter-num"> 446 </span><span>+</span></h2>
                        <p>Lulusan yang Hafidz 30 Juz</p>
                    </div>

                </div>


                <div class="col-md-3">

                    <div class="counter-item">

                        <div><i class="fa fa--people-fill"></i></div>
                        <h2><span class="counter-num"> 644 </span><span>+</span></h2>
                        <p>Wisudawan Tahfidz</p>
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="counter-item">

                        <div><i class="fa fa-heart-o"></i></div>
                        <h2><span class="counter-num"> 648 </span><span>+</span></h2>
                        <p>Jumlah Prestasi Siswa</p>
                    </div>

                </div>


                <div class="col-md-3">

                    <div class="counter-item">

                        <div><i class="fa fa-check"></i></div>
                        <h2><span class="counter-num"> 1066 </span><span>+</span></h2>
                        <p>Jumlah Alumni</p>
                    </div>

                </div>



            </div>



        </div>

    </div>


</section>










<!-- sosmed icon -->
<div class="iconBox">
    <a href="https://api.whatsapp.com/send?phone=6285853049405" class="perIconBox wa">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="" class="perIconBox fb">
        <i class="fab fa-tiktok"></i>
    </a>

    <a href="https://www.instagram.com/official_smaubp?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
        class="perIconBox ig">
        <i class="fab fa-instagram"></i>
    </a>

    <!-- <a href="" class="perIconBox yt">
            <i class="fab fa-youtube"></i>
        </a> -->
    <!-- <a href="" class="perIconBox linkin">
            <i class="fab fa-linkedin-in"></i>
        </a> -->
</div>
@endsection