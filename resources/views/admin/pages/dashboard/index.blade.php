@extends('admin.layouts.app')

@section('style')
    <style>
        .dashboard-card {
            backdrop-filter: blur(10px);
            border: none;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card dashboard-card bg-white bg-opacity-95 stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Total Siswa</h6>
                                <h3 class="card-title mb-0 fw-bold text-primary">1,248</h3>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +5.2% bulan ini</small>
                            </div>
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card dashboard-card bg-white bg-opacity-95 stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Total Guru</h6>
                                <h3 class="card-title mb-0 fw-bold text-success">87</h3>
                                <small class="text-info"><i class="fas fa-minus"></i> Tidak ada perubahan</small>
                            </div>
                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-chalkboard-teacher fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card dashboard-card bg-white bg-opacity-95 stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Kelas Aktif</h6>
                                <h3 class="card-title mb-0 fw-bold text-warning">36</h3>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +2 kelas baru</small>
                            </div>
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-door-open fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card dashboard-card bg-white bg-opacity-95 stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Absensi Hari Ini</h6>
                                <h3 class="card-title mb-0 fw-bold text-info">94.5%</h3>
                                <small class="text-success"><i class="fas fa-arrow-up"></i> +1.2% dari kemarin</small>
                            </div>
                            <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-clipboard-check fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Tables Row -->
        <div class="row mb-4">
            <!-- Grafik Siswa per Jurusan -->
            <div class="col-lg-6 mb-4">
                <div class="card dashboard-card bg-white bg-opacity-95 h-100">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0"><i class="fas fa-chart-pie me-2"></i>Distribusi Siswa per Jurusan</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="studentChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Absensi Bulanan -->
            <div class="col-lg-6 mb-4">
                <div class="card dashboard-card bg-white bg-opacity-95 h-100">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0"><i class="fas fa-chart-line me-2"></i>Tingkat Absensi Bulanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="attendanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Tables Row -->
        <div class="row mb-4">
            <!-- Siswa Terbaru -->
            <div class="col-lg-6 mb-4">
                <div class="card dashboard-card bg-white bg-opacity-95 h-100">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"><i class="fas fa-user-plus me-2"></i>Siswa Terbaru</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <small class="text-white fw-bold">AH</small>
                                                </div>
                                                Ahmad Hidayat
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">X IPA 1</span></td>
                                        <td>2024-01-15</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <small class="text-white fw-bold">SF</small>
                                                </div>
                                                Siti Fatimah
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success">X IPS 2</span></td>
                                        <td>2024-01-14</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-warning rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <small class="text-white fw-bold">BP</small>
                                                </div>
                                                Budi Prasetyo
                                            </div>
                                        </td>
                                        <td><span class="badge bg-warning">XI IPA 3</span></td>
                                        <td>2024-01-13</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-info rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <small class="text-white fw-bold">DN</small>
                                                </div>
                                                Dewi Nurjanah
                                            </div>
                                        </td>
                                        <td><span class="badge bg-info">XII IPS 1</span></td>
                                        <td>2024-01-12</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-secondary rounded-circle me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px;">
                                                    <small class="text-white fw-bold">RH</small>
                                                </div>
                                                Rini Hartini
                                            </div>
                                        </td>
                                        <td><span class="badge bg-secondary">X Bahasa</span></td>
                                        <td>2024-01-11</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengumuman & Kegiatan -->
            <div class="col-lg-6 mb-4">
                <div class="card dashboard-card bg-white bg-opacity-95 h-100">
                    <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"><i class="fas fa-bullhorn me-2"></i>Pengumuman & Kegiatan</h5>
                        <a href="#" class="btn btn-sm btn-outline-success">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Ujian Tengah Semester</h6>
                                        <small class="text-danger">Urgent</small>
                                    </div>
                                    <p class="mb-1">Pelaksanaan UTS akan dimulai tanggal 15 Februari 2024</p>
                                    <small class="text-muted">3 hari yang lalu</small>
                                </div>

                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Lomba Sains Nasional</h6>
                                        <small class="text-primary">Event</small>
                                    </div>
                                    <p class="mb-1">Pendaftaran lomba sains tingkat nasional dibuka</p>
                                    <small class="text-muted">5 hari yang lalu</small>
                                </div>

                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Rapat Guru</h6>
                                        <small class="text-warning">Meeting</small>
                                    </div>
                                    <p class="mb-1">Rapat evaluasi kurikulum bulan ini</p>
                                    <small class="text-muted">1 minggu yang lalu</small>
                                </div>

                                <div class="list-group-item border-0 px-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">Libur Semester</h6>
                                        <small class="text-success">Info</small>
                                    </div>
                                    <p class="mb-1">Jadwal libur semester genap tahun 2024</p>
                                    <small class="text-muted">2 minggu yang lalu</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Overview -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card dashboard-card bg-white bg-opacity-95">
                    <div class="card-header bg-transparent border-0">
                        <h5 class="card-title mb-0"><i class="fas fa-money-bill-wave me-2"></i>Ringkasan Keuangan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 bg-success bg-opacity-10 rounded">
                                    <i class="fas fa-arrow-up fa-2x text-success mb-2"></i>
                                    <h4 class="text-success fw-bold">Rp 2.5M</h4>
                                    <p class="mb-0 text-muted">Pemasukan Bulan Ini</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 bg-danger bg-opacity-10 rounded">
                                    <i class="fas fa-arrow-down fa-2x text-danger mb-2"></i>
                                    <h4 class="text-danger fw-bold">Rp 1.8M</h4>
                                    <p class="mb-0 text-muted">Pengeluaran Bulan Ini</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 bg-primary bg-opacity-10 rounded">
                                    <i class="fas fa-wallet fa-2x text-primary mb-2"></i>
                                    <h4 class="text-primary fw-bold">Rp 15.2M</h4>
                                    <p class="mb-0 text-muted">Saldo Saat Ini</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center p-3 bg-warning bg-opacity-10 rounded">
                                    <i class="fas fa-credit-card fa-2x text-warning mb-2"></i>
                                    <h4 class="text-warning fw-bold">89.5%</h4>
                                    <p class="mb-0 text-muted">Pembayaran SPP</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Chart untuk Distribusi Siswa per Jurusan
        const ctx1 = document.getElementById('studentChart').getContext('2d');
        const studentChart = new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: ['IPA', 'IPS', 'Bahasa', 'Lainnya'],
                datasets: [{
                    data: [452, 398, 267, 131],
                    backgroundColor: [
                        '#4facfe',
                        '#43e97b',
                        '#fa709a',
                        '#fcc468'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // Chart untuk Tingkat Absensi
        const ctx2 = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Tingkat Kehadiran (%)',
                    data: [92.1, 89.5, 94.2, 91.8, 93.5, 94.5],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 85,
                        max: 100,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });

        // Update time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID');
            const dateString = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            // You can add a time display element if needed
            console.log(`${dateString}, ${timeString}`);
        }

        // Update time every second
        setInterval(updateTime, 1000);
        updateTime();
    </script>
@endsection
