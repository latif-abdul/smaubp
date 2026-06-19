@extends('app')
@section('content')

<div class="title">
    <h2>Galeri</h2>
</div>

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

<script>
    window.addEventListener('load', () => {
        var $grid = $('.portfolio-container').isotope({
            itemSelector: '.portfolio-item',
            // layoutMode: 'fitColumns',
            // percentPosition: true,
            // masonry: {
            //     columnWidth: 100
            // }
        });
        // layout Isotope after each image loads
        $grid.imagesLoaded().progress(function () {
            $grid.isotope('layout');
        });
    })
</script>

@endsection