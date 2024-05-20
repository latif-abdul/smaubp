@extends('app')
@section('content')
<div class="container kontak">

    <h3 class="mb-4">Hubungi Kami</h3>
    <form action="">
        <div class="formKontakKiri">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
            </div>

            <div class="form-group">
                <label for="nama">Email</label>
                <input type="email" class="form-control" id="nama">
            </div>

            <div class="form-group">
                <label for="nama">No Telp</label>
                <input type="number" class="form-control" id="nama">
            </div>
        </div>


        <div class="formKontakKanan">
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea name="pesan" id="pesan" cols="30" rows="8" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary float-right">Kirim</button>
        </div>
    </form>
</div>



<iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3407.9225237344845!2d112.55723445474571!3d-7.650284919799873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7877dfa11a2371%3A0x8c80a5aca5c81c16!2sSMAU%20BP%20Amanatul%20Ummah!5e0!3m2!1sen!2sid!4v1707806767840!5m2!1sen!2sid"
    width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy">
</iframe>





<!-- sosmed icon -->
<div class="iconBox">
    <a href="https://api.whatsapp.com/send?phone=6285853049405" class="perIconBox wa">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- <a href="" class="perIconBox fb">
            <i class="fab fa-facebook-f"></i>
        </a> -->

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