<div id="berita" class="content-section mt-4 d-none">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-warning mb-4">Berita Terbaru</h2>
        <a href="{{ route('articles-user.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i>Tambah Berita
        </a>
    </div>
    <div class="row g-4">
        @foreach ($articles as $article)
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <small class="text-warning fw-bold">{{ $article->created_at->format('d M Y') }}</small>
                            <span class="badge bg-primary">{{ $article->category->name }}</span>
                        </div>
                        <h5 class="card-title text-white">{{ $article->title }}</h5>
                        <p class="card-text" style="color: gray !important;">{{ Str::limit($article->content, 100) }}</p>
                        <button class="btn btn-primary btn-sm">publish/Draft</button>
                        <button class="btn btn-primary btn-sm">Baca Selengkapnya</button>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-warning fw-bold">15 Agustus 2024</small>
                        <span class="badge bg-primary">Teknologi</span>
                    </div>
                    <h5 class="card-title text-white">Update Sistem Dashboard</h5>
                    <p class="card-text" style="color: gray !important;">Sistem dashboard telah diperbarui dengan
                        fitur-fitur baru yang lebih
                        user-friendly dan responsif untuk semua perangkat.</p>
                    <button class="btn btn-primary btn-sm">publish/Draft</button>
                    <button class="btn btn-primary btn-sm">Baca Selengkapnya</button>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-warning fw-bold">12 Agustus 2024</small>
                        <span class="badge bg-success">Info</span>
                    </div>
                    <h5 class="card-title text-white">Maintenance Terjadwal</h5>
                    <p class="card-text" style="color: gray !important;">Akan dilakukan maintenance sistem pada tanggal
                        20 Agustus 2024 mulai pukul
                        02.00 - 04.00 WIB.</p>
                    <button class="btn btn-primary btn-sm">publish/Draft</button>
                    <button class="btn btn-primary btn-sm">Baca Selengkapnya</button>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-warning fw-bold">10 Agustus 2024</small>
                        <span class="badge bg-warning text-dark">Pengumuman</span>
                    </div>
                    <h5 class="card-title text-white">Fitur Baru: Notifikasi Real-time</h5>
                    <p class="card-text" style="color: gray !important;">Kini tersedia fitur notifikasi real-time yang
                        akan memberikan update
                        langsung untuk semua aktivitas penting.</p>
                    <button class="btn btn-primary btn-sm">publish/Draft</button>
                    <button class="btn btn-primary btn-sm">Baca Selengkapnya</button>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <small class="text-warning fw-bold">8 Agustus 2024</small>
                        <span class="badge bg-info">Tutorial</span>
                    </div>
                    <h5 class="card-title text-white">Panduan Penggunaan Dashboard</h5>
                    <p class="card-text" style="color: gray !important;">Panduan lengkap cara menggunakan semua fitur
                        yang tersedia di dashboard
                        untuk memaksimalkan produktivitas.</p>
                    <button class="btn btn-primary btn-sm">publish/Draft</button>
                    <button class="btn btn-primary btn-sm">Baca Selengkapnya</button>
                    <button class="btn btn-primary btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </div>
            </div>
        </div> --}}
    </div>
</div>
