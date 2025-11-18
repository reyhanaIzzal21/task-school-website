@extends('user.layouts.app')

@section('style')
    <style>
        /* Gallery Detail Theme */
        :root {
            --detail-primary: #1e60ee;
            --detail-secondary: #ffc107;
            --detail-accent: #1e3a5f;
            --detail-light: #f8f9fa;
            --detail-white: #ffffff;
            --detail-text: #2c3e50;
            --detail-overlay: rgba(0, 0, 0, 0.9);
        }

        /* Page Background */
        .gallery-detail-page {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            padding: 2rem 0 4rem;
        }

        /* Back Button */
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--detail-primary);
            text-decoration: none;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .back-button:hover {
            transform: translateX(-4px);
            box-shadow: 0 4px 15px rgba(30, 96, 238, 0.2);
            color: var(--detail-primary);
        }

        .back-button i {
            transition: transform 0.3s ease;
        }

        .back-button:hover i {
            transform: translateX(-4px);
        }

        /* Header Section */
        .gallery-header-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .gallery-header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--detail-primary) 0%, var(--detail-secondary) 100%);
        }

        .gallery-title {
            color: var(--detail-accent);
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        /* Meta Information */
        .gallery-meta-info {
            display: flex;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .meta-info-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 12px;
            border-left: 4px solid var(--detail-primary);
        }

        .meta-info-item i {
            font-size: 1.5rem;
            color: var(--detail-primary);
        }

        .meta-info-content h6 {
            margin: 0;
            font-size: 0.75rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .meta-info-content p {
            margin: 0;
            font-size: 1rem;
            color: var(--detail-text);
            font-weight: 600;
        }

        /* Photo Count Badge */
        .photo-count-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, var(--detail-primary) 0%, var(--detail-accent) 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(30, 96, 238, 0.3);
        }

        .photo-count-badge i {
            font-size: 1.5rem;
        }

        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        /* Gallery Item */
        .gallery-item {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            aspect-ratio: 1;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .gallery-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 30px rgba(30, 96, 238, 0.25);
            z-index: 10;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Image Overlay */
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(30, 96, 238, 0.8) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
        }

        .gallery-item:hover .image-overlay {
            opacity: 1;
        }

        .image-number {
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .image-number i {
            font-size: 1.5rem;
        }

        /* Zoom Icon */
        .zoom-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .gallery-item:hover .zoom-icon {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.1);
        }

        .zoom-icon i {
            font-size: 1.75rem;
            color: var(--detail-primary);
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--detail-overlay);
            z-index: 9999;
            padding: 2rem;
            animation: fadeIn 0.3s ease;
        }

        .lightbox-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Lightbox Content */
        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
        }

        /* Lightbox Controls */
        .lightbox-close {
            position: fixed;
            top: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--detail-text);
            transition: all 0.3s ease;
            z-index: 10000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .lightbox-close:hover {
            transform: rotate(90deg) scale(1.1);
            background: var(--detail-danger);
            color: white;
        }

        .lightbox-nav {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--detail-text);
            transition: all 0.3s ease;
            z-index: 10000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .lightbox-nav:hover {
            background: var(--detail-primary);
            color: white;
            transform: translateY(-50%) scale(1.1);
        }

        .lightbox-prev {
            left: 2rem;
        }

        .lightbox-next {
            right: 2rem;
        }

        /* Image Counter */
        .lightbox-counter {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 700;
            color: var(--detail-text);
            z-index: 10000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Empty State */
        .empty-gallery {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .empty-gallery i {
            font-size: 5rem;
            color: var(--detail-primary);
            opacity: 0.3;
            margin-bottom: 1.5rem;
        }

        .empty-gallery h3 {
            color: var(--detail-accent);
            margin-bottom: 0.5rem;
        }

        .empty-gallery p {
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .gallery-title {
                font-size: 1.75rem;
            }

            .gallery-header-section {
                padding: 1.5rem;
            }

            .gallery-meta-info {
                gap: 1rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 1rem;
            }

            .lightbox-nav,
            .lightbox-close {
                width: 40px;
                height: 40px;
                font-size: 1.25rem;
            }

            .lightbox-prev {
                left: 1rem;
            }

            .lightbox-next {
                right: 1rem;
            }

            .lightbox-close {
                top: 1rem;
                right: 1rem;
            }

            .lightbox-counter {
                bottom: 1rem;
                font-size: 0.875rem;
                padding: 0.5rem 1rem;
            }
        }

        /* Loading Animation */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .gallery-item {
            animation: slideUp 0.5s ease forwards;
            opacity: 0;
        }

        .gallery-item:nth-child(1) { animation-delay: 0.05s; }
        .gallery-item:nth-child(2) { animation-delay: 0.1s; }
        .gallery-item:nth-child(3) { animation-delay: 0.15s; }
        .gallery-item:nth-child(4) { animation-delay: 0.2s; }
        .gallery-item:nth-child(5) { animation-delay: 0.25s; }
        .gallery-item:nth-child(6) { animation-delay: 0.3s; }
        .gallery-item:nth-child(7) { animation-delay: 0.35s; }
        .gallery-item:nth-child(8) { animation-delay: 0.4s; }
        .gallery-item:nth-child(9) { animation-delay: 0.45s; }
        .gallery-item:nth-child(n+10) { animation-delay: 0.5s; }
    </style>
@endsection

@section('content')
    <div class="gallery-detail-page">
        <div class="container mt-5">

            <!-- Back Button -->
            <a href="{{ route('galleries.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Galeri
            </a>

            <!-- Header Section -->
            <div class="gallery-header-section">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 mb-4">
                    <h1 class="gallery-title mb-0">{{ $gallery->title }}</h1>
                    <div class="photo-count-badge">
                        <i class="bi bi-images"></i>
                        <span>{{ $gallery->images->count() }} Foto</span>
                    </div>
                </div>

                <div class="gallery-meta-info">
                    <div class="meta-info-item">
                        <i class="bi bi-calendar-event"></i>
                        <div class="meta-info-content">
                            <h6>Tanggal</h6>
                            <p>{{ $gallery->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="meta-info-item">
                        <i class="bi bi-clock"></i>
                        <div class="meta-info-content">
                            <h6>Waktu</h6>
                            <p>{{ $gallery->created_at->format('H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            @if($gallery->images->count() > 0)
                <div class="gallery-grid">
                    @foreach ($gallery->images as $index => $image)
                        <div class="gallery-item" data-index="{{ $index }}">
                            <img src="{{ asset('storage/' . $image->image) }}" 
                                 alt="{{ $gallery->title }} - Foto {{ $index + 1 }}"
                                 loading="lazy">
                            <div class="image-overlay">
                                <div class="image-number">
                                    <i class="bi bi-image"></i>
                                    Foto {{ $index + 1 }}
                                </div>
                            </div>
                            <div class="zoom-icon">
                                <i class="bi bi-zoom-in"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-gallery">
                    <i class="bi bi-images"></i>
                    <h3>Tidak Ada Foto</h3>
                    <p>Galeri ini belum memiliki foto</p>
                </div>
            @endif

        </div>
    </div>

    <!-- Lightbox Modal -->
    <div class="lightbox-modal" id="lightbox">
        <button class="lightbox-close" id="lightboxClose">
            <i class="bi bi-x-lg"></i>
        </button>
        <button class="lightbox-nav lightbox-prev" id="lightboxPrev">
            <i class="bi bi-chevron-left"></i>
        </button>
        <button class="lightbox-nav lightbox-next" id="lightboxNext">
            <i class="bi bi-chevron-right"></i>
        </button>
        <div class="lightbox-counter" id="lightboxCounter">1 / 1</div>
        <div class="lightbox-content">
            <img src="" alt="" class="lightbox-image" id="lightboxImage">
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Lightbox functionality
        const galleryItems = document.querySelectorAll('.gallery-item');
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxClose = document.getElementById('lightboxClose');
        const lightboxPrev = document.getElementById('lightboxPrev');
        const lightboxNext = document.getElementById('lightboxNext');
        const lightboxCounter = document.getElementById('lightboxCounter');
        
        let currentIndex = 0;
        const images = @json($gallery->images->pluck('image'));
        const totalImages = images.length;

        // Open lightbox
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                openLightbox(index);
            });
        });

        function openLightbox(index) {
            currentIndex = index;
            updateLightbox();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }

        function updateLightbox() {
            lightboxImage.src = "{{ asset('storage/') }}/" + images[currentIndex];
            lightboxCounter.textContent = `${currentIndex + 1} / ${totalImages}`;
            
            // Show/hide navigation buttons
            lightboxPrev.style.display = currentIndex === 0 ? 'none' : 'flex';
            lightboxNext.style.display = currentIndex === totalImages - 1 ? 'none' : 'flex';
        }

        // Navigation
        lightboxClose.addEventListener('click', closeLightbox);
        
        lightboxPrev.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateLightbox();
            }
        });

        lightboxNext.addEventListener('click', () => {
            if (currentIndex < totalImages - 1) {
                currentIndex++;
                updateLightbox();
            }
        });

        // Close on background click
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft' && currentIndex > 0) {
                currentIndex--;
                updateLightbox();
            } else if (e.key === 'ArrowRight' && currentIndex < totalImages - 1) {
                currentIndex++;
                updateLightbox();
            }
        });

        // Prevent context menu on images
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('contextmenu', (e) => {
                e.preventDefault();
            });
        });
    </script>
@endsection