<!-- sosmed icon -->
<div class="iconBox">
    <a href="https://api.whatsapp.com/send?phone=6282336576055" class="perIconBox wa">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="https://www.tiktok.com/@smaubpamanatulummah?_t=8oTv5ZSsQ8v&_r=1" class="perIconBox fb">
        <i class="fab fa-tiktok"></i>
    </a>

    <a href="https://www.instagram.com/official_smaubp?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
        class="perIconBox ig">
        <i class="fab fa-instagram"></i>
    </a>

    <a href="https://youtube.com/@smaubpamanatulummah?si=dG5U8HmpPzs8FZ-U" class="perIconBox yt">
        <i class="fab fa-youtube"></i>
    </a>
    <!-- <a href="" class="perIconBox linkin">
            <i class="fab fa-linkedin-in"></i>
        </a> -->
</div>
<footer class="footer">

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="my-4 text-white text-center">hubungi kami</h4>

                <div class="footerContactUs">

                    <div class="perFooterContactUs">
                        <i class="fas text-white fa-envelope"></i>
                        <p class="text-white">officialsmaubp@gmail.com</p>
                    </div>

                    <div class="perFooterContactUs">
                        <i class="fas text-white fa-phone-alt"></i>
                        <p class="text-white">(0321) 6855337</p>
                    </div>

                    <div class="perFooterContactUs">
                        <i class="fas text-white fa-road"></i>
                        <p class="text-white">Jl. KH. Abdul Chalim, no.1 Desa Kembangbelor, Kecamatan Pacet, Kabupaten
                            Mojokerto, 61374</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3407.9225237344845!2d112.55723445474571!3d-7.650284919799873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7877dfa11a2371%3A0x8c80a5aca5c81c16!2sSMAU%20BP%20Amanatul%20Ummah!5e0!3m2!1sen!2sid!4v1707806767840!5m2!1sen!2sid"
                        width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>

                </div>

            </div>






            <div class="col-md-4">
                <h4 class="my-4 text-center text-white">About</h4>
                <div class="footerAbout">
                    <a href="{{ url('artikel') }}" class="text-white">Artikel</a>
                    <a href="" class="text-white">Tentang Kami</a>
                    <a href="https://api.whatsapp.com/send?phone=6282336576055" class="text-white">Contact Us</a>
                    <a href="" class="text-white">Ekstrakulikuler</a>
                </div>
            </div>


            <div class="col-md-4 text-center">
                <h4 class="my-4 text-white">Newsletter</h4>
                <form>

                    <div class="form-group">
                        <input class="form-control" type="search" placeholder="Example@gmail.com" aria-label="Search">
                        <button class="btn btn-primary btn-newsletter" type="submit">Kirim</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</footer>
<script>
    document.onreadystatechange = function () {
        if (document.readyState !== "complete") {
            document.querySelector(
                "body").style.visibility = "hidden";
            document.querySelector(
                "#loader").style.visibility = "visible";
        }
        else {
            document.querySelector(
                "#loader").style.display = "none";
            document.querySelector(
                "body").style.visibility = "visible";
        }
    };
</script>
<script src="js/script.js"></script>
<script src="js/scrollCue.min.js"></script>
<script>scrollCue.init();</script>

<!-- Custom Js -->
<!-- <script src="js/custom.js"></script> -->

<!-- Add JS counter lib -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<!-- <script src="http://code.jquery.com/jquery.js"></script> -->
<!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="{{url('js/glightbox.min.js')}}"></script>
<script src="{{url('js/isotope.pkgd.min.js')}}"></script>
<script src="{{url('js/swiper-bundle.min.js')}}"></script>
