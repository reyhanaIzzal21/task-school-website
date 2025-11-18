@extends('user.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="hero-wrapper">

                <div class="hero-main-content text-center">
                    <h1 class="hero-title" data-aos="zoom-in" data-aos-delay="200">
                        SMAN 1 Ponorogo<br>
                        <span class="typed"
                            data-typed-items="Mencetak Generasi Berprestasi dan Berakhlak Mulia,Pendidikan Berkualitas untuk Masa Depan Gemilang,Unggul dalam Prestasi Santun dalam Budi Pekerti"></span>
                    </h1>

                    <p class="hero-description" data-aos="fade-up" data-aos-delay="300">
                        Mempersiapkan siswa menjadi generasi cerdas, berkarakter, dan berprestasi melalui pendidikan berkualitas dengan kurikulum yang seimbang antara akademik, karakter, dan pengembangan potensi diri.
                    </p>

                    <div class="hero-image-showcase" data-aos="fade-up" data-aos-delay="500">
                        <div class="image-wrapper">
                            <img src="images/bg-hero.jpg" class="img-fluid" alt="Strategic Overview">
                            <div class="floating-card card-1" data-aos="fade-right" data-aos-delay="600">
                                <div class="card-content">
                                    <div class="card-icon">
                                        <i class="bi bi-graph-up-arrow"></i>
                                    </div>
                                    <div class="card-info">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="89"
                                                class="purecounter"></span>%</h4>
                                        <p>Siswa Diterima PTN</p>
                                    </div>
                                </div>
                            </div>
                            <div class="floating-card card-2" data-aos="fade-left" data-aos-delay="700">
                                <div class="card-content">
                                    <div class="card-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="card-info">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="80"
                                                class="purecounter"></span>+</h4>
                                        <p>Guru Berpengalaman</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center justify-content-between g-lg-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="image-wrapper">
                        <img src="assets/img/about/about-portrait-7.webp" class="img-fluid rounded" alt="About Us Image">
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="content">
                        <h2 class="mb-4">Tentang SMAN 1 Ponorogo</h2>
                        <h5 class="mb-4">Melahirkan generasi unggul sejak tahun 1950</h5>

                        <p>SMAN 1 Ponorogo adalah lembaga pendidikan menengah atas terkemuka yang berkomitmen menghasilkan lulusan berkualitas dengan prestasi akademik tinggi dan karakter yang kuat. Kami menggabungkan pembelajaran akademis yang berkualitas dengan pembentukan karakter dan pengembangan bakat siswa secara holistik.</p>

                        <div class="features-list mt-5" data-aos="fade-up" data-aos-delay="400">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-award"></i>
                                        <h5>Prestasi Gemilang</h5>
                                        <p>Meraih berbagai penghargaan akademik dan non-akademik tingkat nasional.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-lightbulb"></i>
                                        <h5>Pembelajaran Inovatif</h5>
                                        <p>Metode belajar modern yang mendorong kreativitas dan critical thinking.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-people"></i>
                                        <h5>Karakter Unggul</h5>
                                        <p>Pembentukan karakter melalui pendidikan nilai dan keagamaan.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-graph-up-arrow"></i>
                                        <h5>Jalur Perguruan Tinggi</h5>
                                        <p>Bimbingan intensif untuk persiapan masuk universitas terbaik.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5" data-aos="fade-up" data-aos-delay="600">
                            <a href="#" class="btn btn-primary me-3">Selengkapnya</a>
                            <a href="#" class="btn btn-outline-primary">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Keunggulan Kami</h2>
            <p>Berbagai program dan fasilitas unggulan untuk mendukung pembelajaran optimal siswa</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
                    <div class="intro-content">
                        <h2>Fasilitas lengkap untuk pembelajaran maksimal</h2>
                        <p>Kami menyediakan berbagai fasilitas modern dan lengkap untuk mendukung proses belajar mengajar yang efektif dan menyenangkan bagi seluruh siswa SMAN 1 Ponorogo.</p>
                        <div class="feature-stats">
                            <div class="stat-item">
                                <span class="stat-number">40+</span>
                                <span class="stat-label">Ruang Kelas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3</span>
                                <span class="stat-label">Penjurusan</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Perpustakaan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="intro-image">
                        <img src="assets/img/features/features-2.webp" alt="Features" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="features-grid">
                <div class="feature-item" data-aos="flip-up" data-aos-delay="250">
                    <div class="feature-number">01</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h4>Kurikulum Merdeka</h4>
                        <p>Menerapkan Kurikulum Merdeka yang memberikan kebebasan siswa untuk mengeksplorasi minat dan bakatnya dengan tetap mempertahankan standar akademik yang tinggi.</p>
                        <div class="feature-tags">
                            <span class="tag">Inovatif</span>
                            <span class="tag">Fleksibel</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="300">
                    <div class="feature-number">02</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Program SNBP & SNBT</h4>
                        <p>Bimbingan intensif dan terstruktur untuk mempersiapkan siswa menghadapi seleksi masuk Perguruan Tinggi Negeri melalui jalur SNBP dan SNBT dengan track record kelulusan tinggi.</p>
                        <div class="feature-tags">
                            <span class="tag">PTN</span>
                            <span class="tag">Bimbingan</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="350">
                    <div class="feature-number">03</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Organisasi Siswa Aktif</h4>
                        <p>OSIS, MPK, dan berbagai organisasi ekstrakurikuler yang melatih kepemimpinan, kerjasama tim, dan soft skills penting untuk masa depan siswa.</p>
                        <div class="feature-tags">
                            <span class="tag">Leadership</span>
                            <span class="tag">Networking</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="400">
                    <div class="feature-number">04</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Olimpiade & Kompetisi</h4>
                        <p>Program pembinaan khusus untuk siswa berprestasi dalam berbagai olimpiade sains, matematika, bahasa, dan kompetisi akademik lainnya tingkat nasional dan internasional.</p>
                        <div class="feature-tags">
                            <span class="tag">Olimpiade</span>
                            <span class="tag">Prestasi</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="450">
                    <div class="feature-number">05</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-gear-fill"></i>
                        </div>
                        <h4>Pendidikan Karakter</h4>
                        <p>Program pembentukan karakter terintegrasi yang menanamkan nilai-nilai luhur, kejujuran, tanggung jawab, dan akhlak mulia dalam setiap aspek pembelajaran.</p>
                        <div class="feature-tags">
                            <span class="tag">Karakter</span>
                            <span class="tag">Moral</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="500">
                    <div class="feature-number">06</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>
                        <h4>Pembelajaran Digital</h4>
                        <p>Platform e-learning modern yang memudahkan akses materi, tugas, ujian online, dan komunikasi efektif antara guru dan siswa kapan saja dan dimana saja.</p>
                        <div class="feature-tags">
                            <span class="tag">E-Learning</span>
                            <span class="tag">Modern</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Features Tabs Section -->
    <section id="features-tabs" class="features-tabs section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="tabs-wrapper">
                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-1">
                            <div class="tab-icon">
                                <i class="bi bi-rocket-takeoff"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Akademik</h5>
                                <span>Pembelajaran berkualitas tinggi</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-2">
                            <div class="tab-icon">
                                <i class="bi bi-shield-shaded"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Keamanan</h5>
                                <span>Lingkungan aman dan nyaman</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-3">
                            <div class="tab-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Fasilitas</h5>
                                <span>Sarana prasarana memadai</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-4">
                            <div class="tab-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Bimbingan</h5>
                                <span>Konseling dan mentoring</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                </ul>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tabs-tab-1">
                        <div class="row align-items-center">

                            <div class="col-lg-5">
                                <div class="content-wrapper">
                                    <div class="icon-badge">
                                        <i class="bi bi-rocket-takeoff"></i>
                                    </div>
                                    <h3>Keunggulan Akademik</h3>
                                    <p>Kami berkomitmen memberikan pendidikan akademik terbaik dengan guru-guru berpengalaman dan metode pembelajaran yang efektif untuk mempersiapkan siswa meraih prestasi tinggi dan melanjutkan ke perguruan tinggi terbaik.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Guru berkualifikasi S1 dan S2 berpengalaman</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Kelas MIPA, IPS, dan Bahasa dengan kurikulum terkini</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Program kelas unggulan untuk siswa berprestasi</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Try out rutin dan simulasi ujian nasional</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">98%</div>
                                            <div class="stat-label">Kelulusan</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">1500+</div>
                                            <div class="stat-label">Siswa</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">A</div>
                                            <div class="stat-label">Akreditasi</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Pelajari Lebih Lanjut <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="visual-content">
                                    <div class="main-image">
                                        <img src="assets/img/features/features-4.webp" alt="" class="img-fluid">
                                        <div class="floating-card">
                                            <i class="bi bi-graph-up-arrow"></i>
                                            <div class="card-content">
                                                <span>Prestasi</span>
                                                <strong>Meningkat Pesat</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tabs-tab-2">
                        <div class="row align-items-center">

                            <div class="col-lg-5">
                                <div class="content-wrapper">
                                    <div class="icon-badge">
                                        <i class="bi bi-shield-shaded"></i>
                                    </div>
                                    <h3>Keamanan dan Kenyamanan</h3>
                                    <p>Menciptakan lingkungan sekolah yang aman, nyaman, dan kondusif untuk belajar dengan sistem keamanan terpadu dan suasana yang mendukung perkembangan optimal setiap siswa.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>CCTV di seluruh area sekolah untuk monitoring</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Petugas keamanan profesional yang berjaga</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Program anti-bullying dan lingkungan positif</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Fasilitas UKS dengan tenaga kesehatan terlatih</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">24/7</div>
                                            <div class="stat-label">Keamanan</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">100%</div>
                                            <div class="stat-label">Aman</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">Nyaman</div>
                                            <div class="stat-label">Belajar</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Pelajari Lebih Lanjut <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="visual-content">
                                    <div class="main-image">
                                        <img src="assets/img/features/features-2.webp" alt="" class="img-fluid">
                                        <div class="floating-card">
                                            <i class="bi bi-shield-check"></i>
                                            <div class="card-content">
                                                <span>Keamanan</span>
                                                <strong>Terjamin</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tabs-tab-3">
                        <div class="row align-items-center">

                            <div class="col-lg-5">
                                <div class="content-wrapper">
                                    <div class="icon-badge">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <h3>Fasilitas Lengkap</h3>
                                    <p>Dilengkapi dengan berbagai fasilitas modern dan sarana prasarana yang memadai untuk mendukung kegiatan belajar mengajar serta pengembangan minat dan bakat siswa.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Laboratorium IPA (Fisika, Kimia, Biologi) lengkap</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Laboratorium komputer dengan koneksi internet cepat</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Perpustakaan digital dan ruang baca nyaman</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Ruang kelas ber-AC dengan LCD proyektor</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">15+</div>
                                            <div class="stat-label">Lab</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">40+</div>
                                            <div class="stat-label">Ruang Kelas</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">Modern</div>
                                            <div class="stat-label">Fasilitas</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Pelajari Lebih Lanjut <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="visual-content">
                                    <div class="main-image">
                                        <img src="assets/img/features/features-6.webp" alt="" class="img-fluid">
                                        <div class="floating-card">
                                            <i class="bi bi-speedometer2"></i>
                                            <div class="card-content">
                                                <span>Fasilitas</span>
                                                <strong>Terlengkap</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tabs-tab-4">
                        <div class="row align-items-center">

                            <div class="col-lg-5">
                                <div class="content-wrapper">
                                    <div class="icon-badge">
                                        <i class="bi bi-heart-pulse"></i>
                                    </div>
                                    <h3>Bimbingan Konseling</h3>
                                    <p>Tim guru BK profesional siap membantu siswa dalam menghadapi berbagai tantangan akademik, sosial, maupun personal untuk mencapai potensi terbaik dan merencanakan masa depan.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Konseling akademik dan pemilihan jurusan kuliah</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Bimbingan karir dan perencanaan masa depan</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Konseling psikologi untuk kesehatan mental</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Program motivasi dan pengembangan diri</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">8</div>
                                            <div class="stat-label">Guru BK</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">Siap</div>
                                            <div class="stat-label">Membantu</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">Peduli</div>
                                            <div class="stat-label">Siswa</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Pelajari Lebih Lanjut <i
                                            class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="visual-content">
                                    <div class="main-image">
                                        <img src="assets/img/features/features-1.webp" alt="" class="img-fluid">
                                        <div class="floating-card">
                                            <i class="bi bi-headset"></i>
                                            <div class="card-content">
                                                <span>Bimbingan</span>
                                                <strong>Selalu Ada</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End tab content item -->

                </div>
            </div>

        </div>

    </section><!-- /Features Tabs Section -->

    {{-- include section --}}
    @include('user.pages.home.widgets.teacher')
    @include('user.pages.home.widgets.stars')
    @include('user.pages.home.widgets.faq')
    @include('user.pages.home.widgets.cta')
    @include('user.pages.home.widgets.testimonial')
@endsection
