<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/admin" class="simple-text">
                Admin
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="#">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="pe-7s-user"></i>
                    <p>Ekstrakulikuler</p>
                </a>
            </li>
            <li>
                <a href="/admin/artikel">
                    <i class="pe-7s-note2"></i>
                    <p>Artikel</p>
                </a>
            </li>

            <li>
                <a href="/admin/artikel_santri">
                    <i class="pe-7s-note2"></i>
                    <p>Artikel Santri</p>
                </a>
            </li>
            <li>
                <a href="/admin/siswa_baru">
                    <i class="pe-7s-user"></i>
                    <p>Siswa Baru</p>
                </a>
            </li>
            <li>
                <a href="/setting">
                    <i class="fa-solid fa-gear"></i>
                    <p>Setting</p>
                </a>
            </li>
            <li>
                <a href="/admin/pencapaian_alumni">
                    <i class="fa-solid fa-trophy"></i>
                    <p>Pencapaian Alumni</p>
                </a>
            </li>
            <li>
                <a href="/galeri">
                    <i class="fa-solid fa-image"></i>
                    <p>Galeri</p>
                </a>
            </li>
            <!-- <li>
                <a href="maps.html">
                    <i class="pe-7s-map-marker"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="notifications.html">
                    <i class="pe-7s-bell"></i>
                    <p>Notifications</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>
<!-- <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left pull-right">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li class="separator hidden-lg"></li>
                </ul>
            </div>
        </div>
    </nav>
</div> -->
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav navbar-left pull-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  me-5" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/edit_profile">Edit Profile</a>
                        <a class="dropdown-item" href="/change_password">Change Password</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">@yield('content')</div>