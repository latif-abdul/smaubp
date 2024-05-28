<nav class="navbar navbar-expand-lg navbar-light navbarKu fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="images/logo.png" alt="Logo SMK N 2 Purbalingga">
                <h1>SMA-MAU BP<br>Amanatul Ummah</h1>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Kegiatan<br>Sekolah</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('ppdb') }}">PPDB</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('artikel') }}">Artikel</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="{{ url('ekskul') }}">Tentang Kami</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('kontak') }}">Contact Us</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">

                    <!-- <input class="form-control sm-2" type="search" placeholder="Cari Artikel" aria-label="Search">

                    <button class="btn btn-primary sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button> -->

                </form>
            </div>

        </div>
    </nav>