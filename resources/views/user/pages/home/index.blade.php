@extends('user.layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container">
            <div class="hero-wrapper">

                <div class="hero-main-content text-center">
                    <h1 class="hero-title" data-aos="zoom-in" data-aos-delay="200">
                        SMK 1 Konoha<br>
                        <span class="typed"
                            data-typed-items="Number One School In The World,Seamless Integration,Based On Advanced Technology"></span>
                    </h1>

                    <p class="hero-description" data-aos="fade-up" data-aos-delay="300">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime provident praesentium sequi omnis
                        excepturi. Odio modi assumenda magnam nulla explicabo.
                    </p>

                    <div class="hero-image-showcase" data-aos="fade-up" data-aos-delay="500">
                        <div class="image-wrapper">
                            <img src="assets/img/about/about-18.webp" class="img-fluid" alt="Strategic Overview">
                            <div class="floating-card card-1" data-aos="fade-right" data-aos-delay="600">
                                <div class="card-content">
                                    <div class="card-icon">
                                        <i class="bi bi-graph-up-arrow"></i>
                                    </div>
                                    <div class="card-info">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="89"
                                                class="purecounter"></span>%</h4>
                                        <p>Siswa DIterima Kerja</p>
                                    </div>
                                </div>
                            </div>
                            <div class="floating-card card-2" data-aos="fade-left" data-aos-delay="700">
                                <div class="card-content">
                                    <div class="card-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="card-info">
                                        <h4><span data-purecounter-start="0" data-purecounter-end="500"
                                                class="purecounter"></span>+</h4>
                                        <p>Guru Profesional</p>
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
                        <h2 class="mb-4">Our Story</h2>
                        <h5 class="mb-4">Crafting innovative solutions since 2010</h5>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel mauris in magna fringilla
                            finibus. Suspendisse potenti. Integer ut fringilla mi, a aliquam risus. Maecenas ac nibh magna.
                            Aenean fringilla lobortis ex, sit amet iaculis eros facilisis nec.</p>

                        <div class="features-list mt-5" data-aos="fade-up" data-aos-delay="400">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-award"></i>
                                        <h5>Excellence</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-lightbulb"></i>
                                        <h5>Innovation</h5>
                                        <p>Proin vel mauris in magna fringilla finibus.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-people"></i>
                                        <h5>Community</h5>
                                        <p>Suspendisse potenti. Integer ut fringilla mi.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-item">
                                        <i class="bi bi-graph-up-arrow"></i>
                                        <h5>Growth</h5>
                                        <p>Maecenas ac nibh magna. Aenean fringilla lobortis ex.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5" data-aos="fade-up" data-aos-delay="600">
                            <a href="#" class="btn btn-primary me-3">Learn More</a>
                            <a href="#" class="btn btn-outline-primary">Contact Us</a>
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
            <h2>Features</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row align-items-center mb-5">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
                    <div class="intro-content">
                        <h2>Powerful features to accelerate growth</h2>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris.</p>
                        <div class="feature-stats">
                            <div class="stat-item">
                                <span class="stat-number">150+</span>
                                <span class="stat-label">Features</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">99.9%</span>
                                <span class="stat-label">Uptime</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Support</span>
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
                        <h4>Lightning Fast Performance</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur excepteur sint.</p>
                        <div class="feature-tags">
                            <span class="tag">Speed</span>
                            <span class="tag">Optimization</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="300">
                    <div class="feature-number">02</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Enterprise Security</h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum sed.</p>
                        <div class="feature-tags">
                            <span class="tag">Secure</span>
                            <span class="tag">Protected</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="350">
                    <div class="feature-number">03</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Team Collaboration</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <div class="feature-tags">
                            <span class="tag">Teamwork</span>
                            <span class="tag">Sync</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="400">
                    <div class="feature-number">04</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Advanced Analytics</h4>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat duis.</p>
                        <div class="feature-tags">
                            <span class="tag">Data</span>
                            <span class="tag">Insights</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="450">
                    <div class="feature-number">05</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-gear-fill"></i>
                        </div>
                        <h4>Smart Automation</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                            totam rem aperiam.</p>
                        <div class="feature-tags">
                            <span class="tag">AI</span>
                            <span class="tag">Workflow</span>
                        </div>
                    </div>
                </div>

                <div class="feature-item" data-aos="flip-up" data-aos-delay="500">
                    <div class="feature-number">06</div>
                    <div class="feature-content">
                        <div class="feature-icon">
                            <i class="bi bi-cloud-arrow-up"></i>
                        </div>
                        <h4>Cloud Integration</h4>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo
                            nemo enim ipsam.</p>
                        <div class="feature-tags">
                            <span class="tag">Cloud</span>
                            <span class="tag">Scalable</span>
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
                                <h5>Innovation</h5>
                                <span>Cutting-edge solutions</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-2">
                            <div class="tab-icon">
                                <i class="bi bi-shield-shaded"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Security</h5>
                                <span>Advanced protection</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-3">
                            <div class="tab-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Performance</h5>
                                <span>Lightning fast speed</span>
                            </div>
                        </a>
                    </li><!-- End tab nav item -->

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tabs-tab-4">
                            <div class="tab-icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <div class="tab-content">
                                <h5>Support</h5>
                                <span>24/7 assistance</span>
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
                                    <h3>Innovation Excellence</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                        laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Excepteur sint occaecat cupidatat non proident</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Sunt in culpa qui officia deserunt mollit anim</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>At vero eos et accusamus et iusto odio</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Et harum quidem rerum facilis est et expedita</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">99%</div>
                                            <div class="stat-label">Uptime</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">50K+</div>
                                            <div class="stat-label">Users</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">24/7</div>
                                            <div class="stat-label">Support</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Learn More <i
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
                                                <span>Performance</span>
                                                <strong>+85% Improvement</strong>
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
                                    <h3>Advanced Security</h3>
                                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet consectetur adipisci
                                        velit sed quia non numquam eius modi tempora incidunt ut labore.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Temporibus autem quibusdam et aut officiis</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Nam libero tempore cum soluta nobis</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Itaque earum rerum hic tenetur a sapiente</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Quis autem vel eum iure reprehenderit qui</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">256-bit</div>
                                            <div class="stat-label">Encryption</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">ISO</div>
                                            <div class="stat-label">Certified</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">GDPR</div>
                                            <div class="stat-label">Compliant</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Learn More <i
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
                                                <span>Security</span>
                                                <strong>Military Grade</strong>
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
                                    <h3>Lightning Performance</h3>
                                    <p>Ut enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit
                                        laboriosam nisi ut aliquid ex ea commodi consequatur quis autem vel.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Duis aute irure dolor in reprehenderit in voluptate</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Excepteur sint occaecat cupidatat non proident</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Sunt in culpa qui officia deserunt mollit</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Sed ut perspiciatis unde omnis iste natus</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">0.5s</div>
                                            <div class="stat-label">Load Time</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">100%</div>
                                            <div class="stat-label">Optimized</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">CDN</div>
                                            <div class="stat-label">Global</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Learn More <i
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
                                                <span>Speed</span>
                                                <strong>Ultra Fast</strong>
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
                                    <h3>Premium Support</h3>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia
                                        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Neque porro quisquam est qui dolorem ipsum</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Quia dolor sit amet consectetur adipisci velit</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Sed quia non numquam eius modi tempora</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <span>Incidunt ut labore et dolore magnam aliquam</span>
                                        </div>
                                    </div>

                                    <div class="stats-row">
                                        <div class="stat-item">
                                            <div class="stat-number">24/7</div>
                                            <div class="stat-label">Available</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">2min</div>
                                            <div class="stat-label">Response</div>
                                        </div>
                                        <div class="stat-item">
                                            <div class="stat-number">Expert</div>
                                            <div class="stat-label">Team</div>
                                        </div>
                                    </div>

                                    <a href="#" class="btn-primary">Learn More <i
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
                                                <span>Support</span>
                                                <strong>Always Here</strong>
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
