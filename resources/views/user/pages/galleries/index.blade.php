@extends('user.layouts.app')

@section('style')
    <style>
        /* Gallery Theme Colors */
        :root {
            --gallery-primary: #1e60ee;
            --gallery-secondary: #ffc107;
            --gallery-accent: #1e3a5f;
            --gallery-light: #f8f9fa;
            --gallery-white: #ffffff;
            --gallery-text: #2c3e50;
        }

        /* Section Styling */
        #galleries {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            position: relative;
        }

        /* Header Styling */
        .gallery-header {
            position: relative;
            padding: 3rem 0 2rem;
        }

        .gallery-header h2 {
            color: var(--gallery-accent);
            font-weight: 800;
            position: relative;
            display: inline-block;
        }

        .gallery-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--gallery-primary), var(--gallery-secondary));
            border-radius: 2px;
        }

        .gallery-header p {
            color: var(--gallery-text);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 1.5rem auto 0;
        }

        /* Gallery Card */
        .gallery-card {
            background: var(--gallery-white);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .gallery-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gallery-primary) 0%, var(--gallery-secondary) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(30, 96, 238, 0.2);
        }

        .gallery-card:hover::before {
            opacity: 1;
        }

        /* Image Grid Container */
        .gallery-images {
            position: relative;
            width: 100%;
            height: 280px;
            overflow: hidden;
            background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
        }

        /* Single Image Layout */
        .image-single {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .image-single img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .image-single img {
            transform: scale(1.1);
        }

        /* Two Images Layout */
        .image-double {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4px;
            height: 100%;
        }

        .image-double .image-item {
            position: relative;
            overflow: hidden;
        }

        .image-double img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .image-double img {
            transform: scale(1.08);
        }

        /* Three Images Layout */
        .image-triple {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 4px;
            height: 100%;
        }

        .image-triple .image-main {
            grid-row: 1 / 3;
            position: relative;
            overflow: hidden;
        }

        .image-triple .image-secondary {
            position: relative;
            overflow: hidden;
        }

        .image-triple img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .image-triple img {
            transform: scale(1.08);
        }

        /* Four+ Images Layout */
        .image-quad {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 4px;
            height: 100%;
        }

        .image-quad .image-item {
            position: relative;
            overflow: hidden;
        }

        .image-quad img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .image-quad img {
            transform: scale(1.08);
        }

        /* More Images Overlay */
        .more-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(30, 96, 238, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            backdrop-filter: blur(4px);
            transition: all 0.3s ease;
        }

        .gallery-card:hover .more-overlay {
            background: rgba(30, 58, 95, 0.9);
        }

        /* No Image State */
        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            font-size: 3rem;
        }

        .no-image i {
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .no-image span {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Card Content */
        .gallery-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .gallery-title {
            color: var(--gallery-accent);
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Meta Info */
        .gallery-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .meta-item i {
            color: var(--gallery-primary);
            font-size: 1rem;
        }

        /* Photo Count Badge */
        .photo-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--gallery-primary) 0%, var(--gallery-accent) 100%);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .photo-badge i {
            font-size: 1rem;
        }

        /* View Button */
        .btn-view {
            background: linear-gradient(135deg, var(--gallery-primary) 0%, var(--gallery-accent) 100%);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: auto;
        }

        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 96, 238, 0.4);
            color: white;
        }

        .btn-view i {
            transition: transform 0.3s ease;
        }

        .btn-view:hover i {
            transform: translateX(4px);
        }

        /* Pagination */
        .pagination {
            margin-top: 3rem;
        }

        .pagination .page-link {
            border: 2px solid var(--gallery-primary);
            color: var(--gallery-primary);
            border-radius: 8px;
            margin: 0 0.25rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background-color: var(--gallery-primary);
            color: white;
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--gallery-primary) 0%, var(--gallery-accent) 100%);
            border-color: var(--gallery-primary);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--gallery-primary);
            opacity: 0.3;
            margin-bottom: 1.5rem;
        }

        .empty-state h3 {
            color: var(--gallery-accent);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .gallery-header h2 {
                font-size: 2rem;
            }

            .gallery-images {
                height: 240px;
            }

            .gallery-meta {
                gap: 1rem;
            }

            .image-triple,
            .image-quad {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto;
            }

            .image-triple .image-main {
                grid-row: auto;
                grid-column: 1 / 3;
            }
        }

        /* Loading Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gallery-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .gallery-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .gallery-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .gallery-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .gallery-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .gallery-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .gallery-card:nth-child(6) {
            animation-delay: 0.6s;
        }
    </style>
@endsection

@section('content')
    <section id="galleries" class="py-5 mt-4">
        <div class="container">

            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery Sekolah</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <!-- Gallery Grid -->
            @if ($galleries->count() > 0)
                <div class="row g-4">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-6 col-lg-4">
                            <div class="gallery-card">

                                <!-- Images Grid -->
                                <div class="gallery-images">
                                    @php
                                        $imageCount = $gallery->images->count();
                                    @endphp

                                    @if ($imageCount === 0)
                                        <!-- No Images -->
                                        <div class="no-image">
                                            <i class="bi bi-image"></i>
                                            <span>Tidak ada gambar</span>
                                        </div>
                                    @elseif ($imageCount === 1)
                                        <!-- Single Image -->
                                        <div class="image-single">
                                            <img src="{{ asset('storage/' . $gallery->images[0]->image) }}"
                                                alt="{{ $gallery->title }}">
                                        </div>
                                    @elseif ($imageCount === 2)
                                        <!-- Two Images -->
                                        <div class="image-double">
                                            <div class="image-item">
                                                <img src="{{ asset('storage/' . $gallery->images[0]->image) }}"
                                                    alt="{{ $gallery->title }}">
                                            </div>
                                            <div class="image-item">
                                                <img src="{{ asset('storage/' . $gallery->images[1]->image) }}"
                                                    alt="{{ $gallery->title }}">
                                            </div>
                                        </div>
                                    @elseif ($imageCount === 3)
                                        <!-- Three Images -->
                                        <div class="image-triple">
                                            <div class="image-main">
                                                <img src="{{ asset('storage/' . $gallery->images[0]->image) }}"
                                                    alt="{{ $gallery->title }}">
                                            </div>
                                            <div class="image-secondary">
                                                <img src="{{ asset('storage/' . $gallery->images[1]->image) }}"
                                                    alt="{{ $gallery->title }}">
                                            </div>
                                            <div class="image-secondary">
                                                <img src="{{ asset('storage/' . $gallery->images[2]->image) }}"
                                                    alt="{{ $gallery->title }}">
                                            </div>
                                        </div>
                                    @else
                                        <!-- Four+ Images -->
                                        <div class="image-quad">
                                            @for ($i = 0; $i < 4; $i++)
                                                <div class="image-item">
                                                    @if ($i < 3)
                                                        <img src="{{ asset('storage/' . $gallery->images[$i]->image) }}"
                                                            alt="{{ $gallery->title }}">
                                                    @else
                                                        <img src="{{ asset('storage/' . $gallery->images[$i]->image) }}"
                                                            alt="{{ $gallery->title }}">
                                                        @if ($imageCount > 4)
                                                            <div class="more-overlay">
                                                                +{{ $imageCount - 4 }}
                                                            </div>
                                                        @endif
                                                    @endif
                                                </div>
                                            @endfor
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="gallery-content">
                                    @if ($imageCount > 0)
                                        <div class="photo-badge">
                                            <i class="bi bi-images"></i>
                                            <span>{{ $imageCount }} Foto</span>
                                        </div>
                                    @endif

                                    <h5 class="gallery-title">
                                        {{ $gallery->title }}
                                    </h5>

                                    <div class="gallery-meta">
                                        <div class="meta-item">
                                            <i class="bi bi-person-circle"></i>
                                            <span>{{ $gallery->user->name ?? 'Admin' }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <i class="bi bi-calendar-event"></i>
                                            <span>{{ $gallery->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('galleries.show', $gallery) }}" class="btn-view">
                                        Lihat Galeri
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $galleries->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state">
                    <i class="bi bi-images"></i>
                    <h3>Belum Ada Galeri</h3>
                    <p>Galeri foto akan ditampilkan di sini</p>
                </div>
            @endif

        </div>
    </section>
@endsection
