@extends('app')
@section('content')
<ul id="autoWidth" class="cs-hidden">
    @foreach($slideshow as $ss)
        <li class="item-a">
            <section class="slideshow">
                <img class="satu" src="images/banner-shd.png" alt="Team Work"
                    style="background-image: url('{{url('uploads/' . $ss->gambar)}}');">
                <div class="shadow"></div>
                <div class="container">
                    <div class="mainText">
                        <div class="garis"></div>
                        <h3>{{$ss->text_1}}</h3>
                        <h1>{{$ss->text_2}}</h1>
                    </div>

                    <!-- <h3>Teamwork In Our Endeavours</h3> -->
                </div>
            </section>
        </li>
    @endforeach
</ul>







<div class="sambutan container">
    <h1>WELCOME TO SMA Unggulan Berbasis Pesantren Amanatul Ummah</h1>
    <h1>“Sekolahnya Para Champions”</h1>
    <p>
        “SMA Unggulan Berbasis Pesantren Amanatul Ummah dengan program unggulan “Tahfidzul Qur’an” menjamin murid
        muridnya menghafal Al Qur’an , lulus 100% berklasifisi “A”, serta lulusannya diterima di Perguruan Tinggi
        Favorit sesuai pilihannya, baik di dalam negeri maupun luar negeri. Proses pembelajaran menggunakan sistem yang
        kompetitif, penuh kejujuran, dan rasa percaya diri, dalam bentuk dauroh, try out, dan pembahasan tuntas.”

    </p>
</div>

@foreach ($sambutan as $sbt)

    <div class="kepsek" data-cues="slideInUp">
        <div class="container">

            @if (($loop->index + 1) % 2 == 1)
                <img src="{{ url('uploads/' . $sbt->foto) }}" alt="pendiri SMA-MAU Ummah" data-delay="2000ms">
            @endif
            <div class="visiMisi">

                <!-- <div class="visi">
                                    <h5>Our Vision</h5>
                                    <h3>Terwujudnya manusia yang unggul, utuh dan berakhlakul karimah guna kemulyaan dan kejayaan Islam dan kaum muslimin , 
                                        kemulyaan dan kejayaan seluruh bangsa Indonesia dan untuk terwujudnya cita cita luhur kemerdekaan
                                        yaitu terwujudnya kesejahteraan dan tegaknya keadilan utamanya di negara Republik Indonesia.
                                    </h3>
                                </div> -->

                <div class="misi">
                    <h5>{{$sbt->nama}}</h5>
                    <h6 class="text-secondary">{{$sbt->jabatan}}</h6>
                    <p>
                        <br>
                        {{$sbt->sambutan}}
                    </p>
                </div>

            </div>
            @if (($loop->index + 1) % 2 == 0)
                <img src="{{ url('uploads/' . $sbt->foto) }}" alt="pendiri SMA-MAU Ummah" data-delay="2000ms">
            @endif
        </div>
    </div>
    <br>
@endforeach

<br>
<h2 align="center">Program Tahfidzul Qur'an</h2>
<div class="kepsek" data-cues="slideInUp">
    <div class="container">
        <img src="/Tahfidzul Qur_an/XII-7 bersama Gus-Ning.jpg" alt="Img Artikel" class="imgArtikel" style="margin-top:10px">
        <div class="visiMisi">

            <!-- <div class="visi">
                <h5>Our Vision</h5>
                <h3>Terwujudnya manusia yang unggul, utuh dan berakhlakul karimah guna kemulyaan dan kejayaan Islam dan kaum muslimin , 
                    kemulyaan dan kejayaan seluruh bangsa Indonesia dan untuk terwujudnya cita cita luhur kemerdekaan
                    yaitu terwujudnya kesejahteraan dan tegaknya keadilan utamanya di negara Republik Indonesia.
                </h3>
            </div> -->

            <div class="misi">
                <!-- <h5></h5> -->
                <p>Pelaksanaan program tahfidzul qur’an di SMA Unggulan BP dilaksanakan secara komprehensif setiap hari Senin –
                    Jum’at
                    dengan
                    menerapkan 3 metode yaitu; tartil, tahfidz dan taqrir. Dari metode tersebut, santri SMA Unggulan BP mampu
                    menerapkan
                    metodologi
                    pembelajaran yang ketat dan bertanggung jawab. Alhamdulilah dengan penerapan metode ini, terlihat
                    peningkatan
                    jumlah santri
                    yang mampu menghafal 30 juz. Pada tahun 2024 SMA Unggulan BP Amanatul Ummah mewisuda sejumlah 79 santri
                    kategori 30 Juz,
                    92 santri kategori
                    15 Juz, 62 santri kategori 9 Juz</p>
            </div>

        </div>
    </div>
</div>

<!-- jurusan -->
<div class="jurusan">
    <div class="container">
        <h2>Prestasi SMA-Unggulan BP Amanatul Ummah</h2>
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row portfolio-container">
                    @foreach ($galeri as $gallery)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{url('uploads/' . $gallery->gambar)}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{$gallery->prestasi}}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
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
                                     @foreach ($batch as $gelombang)
                                     <th class="column-3">{{$gelombang->name}}</th>
                                     @endforeach
                                   
                                    <!-- <th class="column-4">Tes Tulis Gel. 2</th>
                                    <th class="column-5">Tes Tulis Gel. 3</th> -->
                                </tr>
                            </thead>
                            <tbody class="row-hover">
                                <tr class="row-2 even">
                                    <td class="column-1">
                                        <strong>Waktu Pendaftaran</strong>
                                    </td>
                                    <!-- <td class="column-2">Coming Soon</td> -->
                                     @foreach ($batch as $gelombang)
                                     <td class="column-3">{{Carbon\Carbon::parse($gelombang->date_from)->isoFormat('D MMMM Y')}} &#8211;{{Carbon\Carbon::parse($gelombang->date_to)->isoFormat('D MMMM Y')}}</td>
                                     @endforeach
                                    
                                    <!-- <td class="column-4">20 Oktober 2024 &#8211;1 Maret 2025</td>
                                    <td class="column-5">2 Maret &#8211;29 Juni 2025</td> -->
                                </tr>
                                <tr class="row-3 odd">
                                    <td class="column-1">
                                        <strong>Pelaksanaan Ujian</strong>
                                    </td>
                                    @foreach ($batch as $gelombang)
                                    <td class="column-3">{{Carbon\Carbon::parse($gelombang->tanggal_tes)->isoFormat('D MMMM Y')}}</td>
                                    @endforeach
                                    <!-- <td class="column-2">Coming Soon</td> -->
                                    
                                    <!-- <td class="column-4">2 Maret 2025</td>
                                    <td class="column-5">29 Juni 2025</td> -->
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
                        <center><a class="btn btn-primary" href="/form">Daftar</a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="containerArtikelHome container" data-cues="slideInUp">
    <h2>Artikel Terbaru</h2>

    <div class="artikelHome">

        @csrf
        @foreach ($artikel as $art)
            <a class="perArtikelHome" href="/artikel/{{$art->id}}">
                @foreach($art->images as $img)
                    @if ($loop->first)
                        <img src="/uploads/{{$img->gambar}}" alt="Foto Artikel" data-delay="220ms">
                    @endif

                @endforeach
                <h3>{{$art->judul}}</h3>
                <small>Di tulis oleh : <span>{{$art->penulis}}</span></small>
                <p>
                    <!-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corrupti quo, iure repellendus explicabo
                                        delectus quasi amet libero iusto sequi at. -->
                </p>
            </a>
        @endforeach
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
                            Prestasi Alumni Tahun 2024
                        </h2>
                    </div>
                </div>
                <div align="center">
                    @foreach ($dir as $fileinfo)
                        @if (!$fileinfo->isDot())
                            <img src="/logo kampus/{{$fileinfo->getFilename()}}" width="3%">
                        @endif
                    @endforeach
                </div>
                <div class="elementor-element elementor-element-b0445fe animated-slow elementor-invisible elementor-widget elementor-widget-text-editor"
                    data-id="b0445fe" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}"
                    data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <center>
                            <table id="tablepress-1" class="tablepress tablepress-id-1">
                                <thead>
                                    <tr class="row-1 odd">
                                        <th class="column-1">Nama</th>
                                        <th class="column2">Universitas</th>
                                        <th class="column-3">Program Studi</th>
                                        <th class="column-4">Perolehan Hafalan</th>
                                    </tr>
                                </thead>
                                <tbody class="row-hover">
                                    @foreach ($alumni as $palumni)


                                        <tr class="row-2 even">
                                            <td class="column-1">{{$palumni->name}}</td>
                                            <!-- <td class="column-2">Coming Soon</td> -->
                                            <td class="column-3">{{$palumni->universitas}}</td>
                                            <td class="column-4">{{$palumni->prodi}}</td>
                                            <td class="column-5">{{$palumni->perolehan_hafalan}}</td>
                                        </tr>
                                    @endforeach
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
                            <br>
                            <center><a class="btn btn-primary load_more" href="#">View More</a></center>
                            </p>
                            <script src="{{url('js/expandable-table.js')}}"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Counters -->
<section class="counter">

    <div class="counter-overlay">

        <div class="container wow bounceInLeft" data-wow-duration="1s">

            <div class="row text-center">

                <div class="col-md-3">

                    <div class="counter-item">

                        <!-- <div><i class="fa fa-cloud-download"></i></div> -->
                        <h2><span class="counter-num"> 61+ </span><span>+</span></h2>
                        <p>Wisudawan Tahfidz 30 juz</p>
                    </div>

                </div>


                <div class="col-md-3">

                    <div class="counter-item">

                        <!-- <div><i class="fa fa--people-fill"></i></div> -->
                        <h2><span class="counter-num"> 29+ </span><span>+</span></h2>
                        <p>Wisudawan Tahfidz 15 Juz</p>
                    </div>

                </div>

                <div class="col-md-3">

                    <div class="counter-item">

                        <!-- <div><i class="fa fa-heart-o"></i></div> -->
                        <h2><span class="counter-num"> 62+ </span><span>+</span></h2>
                        <p>Wisudawan Tahfidz 9 Juz</p>
                    </div>

                </div>


                <div class="col-md-3">

                    <div class="counter-item">

                        <!-- <div><i class="fa fa-check"></i></div> -->
                        <h2><span class="counter-num"> 275+ </span><span>+</span></h2>
                        <p>Prestasi</p>
                    </div>

                </div>



            </div>



        </div>

    </div>


</section>
<script>
    // window.addEventListener('load', () => {
    //     var $grid = $('.portfolio-container').isotope({
    //         itemSelector: '.portfolio-item',
    //         // layoutMode: 'fitColumns',
    //         // percentPosition: true,
    //         // masonry: {
    //         //     columnWidth: 100
    //         // }
    //     });
    //     // layout Isotope after each image loads
    //     // $grid.imagesLoaded().progress(function () {
    //     //     $grid.isotope('layout');
    //     // });
    // })
</script>
@endsection