<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="{{ asset('images/logo-smaza.png') }}" alt="">
            <h1 class="sitename">SMAN 1 Ponorogo</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li class="dropdown">
                    <a href="/"><span>Home</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#about">tentang</a></li>
                        <li><a href="#features">Keunggulan</a></li>
                        <li><a href="#team">Guru</a></li>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#testimonials">Testimoni Alumni</a></li>
                    </ul>
                </li>
                {{-- <li><a href="{{ route('majors') }}">Kopetensi Keahlian</a></li> --}}
                <li><a href="{{ route('articles.index') }}">Berita</a></li>
                <li><a href="{{ route('galleries.index') }}">Galeri</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @if (Route::has('login'))
            @auth
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li class="dropdown">
                            <div>
                                <span class="me-2">{{ Auth::user()->name }}</span>
                                @if (Auth::user()->photo)
                                    <img src="{{ asset(Auth::user()->photo) }}" alt="Foto"
                                        class="w-20 h-20 rounded-circle" style="width:40px; height:40px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/avatar.png') }}" alt="Foto"
                                        class="w-20 h-20 rounded-circle" style="width:40px; height:40px; object-fit: cover;">
                                @endif
                            </div>
                            <ul>
                                @if (Auth::user()->hasRole('admin'))
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                @else
                                    <li><a href="{{ route('dashboard.user') }}">Profile</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="javascript:void(0)" class="btn btn-outline-info mx-3 mt-2 d-block"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <p class="mb-0 fs-6 text-grey">Logout</p>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            @else
                <nav class="btn-getstarted">
                    <a href="{{ route('login') }}" class="btn-getstarted fs-6" style="later-spacing: 5px;">
                        Login
                    </a>
                </nav>
            @endauth
        @endif

    </div>
</header>
