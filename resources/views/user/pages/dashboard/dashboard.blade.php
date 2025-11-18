@extends('user.layouts.app')
@php
    use App\Models\Resume;
    $resume = Resume::where('user_id', Auth::id())->first();
@endphp

@push('style')
    @include('user.pages.dashboard.style.dashboard')
@endpush

@section('content')
    <!-- Banner -->
    <div class="banner position-relative" style="height: 200px;">
        <div class="position-absolute bottom-0 start-0" style="transform: translateY(50%);margin-left: 8%;">
            <div class="d-flex align-items-center">
                <div class="profile-img rounded-circle d-flex align-items-center justify-content-center"
                    style="width: 100px; height: 100px;">
                    @if (Auth::user()->photo)
                        <img src="{{ asset(Auth::user()->photo) }}" alt="Profile Photo" class="rounded-circle"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/dafault-avatar.jpg') }}" alt="avatar" width="100"
                            height="100" class="rounded-circle">
                    @endif
                </div>
                <div class="ms-3">
                    <h4 class="text-gray-800 mb-0 fw-bold">{{ Auth::user()->name }}</h4>
                    <p class="text-gray-800 mb-0 opacity-75">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <!-- Navigation Menu -->
        <div class="mt-5 pt-3 border-bottom border-secondary pb-3">
            <nav class="nav gap-2">
                <a href="#" class="nav-link btn btn-outline-warning active px-4" onclick="showSection('dashboard')"
                    id="nav-dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                @if (Auth::user()->hasRole('redaksi'))
                    <a href="#" class="nav-link btn btn-outline-warning px-4" onclick="showSection('berita')"
                        id="nav-berita">
                        <i class="fas fa-newspaper me-2"></i>Berita
                    </a>
                @endif
                <a href="#" class="nav-link btn btn-outline-warning px-4" onclick="showSection('cv')"
                    id="nav-curiculum-vitae">
                    <i class="ti ti-file-cv"></i>CV
                </a>
                <a href="#" class="nav-link btn btn-outline-warning px-4" onclick="showSection('profile')"
                    id="nav-profile">
                    <i class="fas fa-user-circle me-2"></i>Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="javascript:void(0)" class="nav-link btn btn-outline-danger px-4"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </form>
            </nav>
        </div>

        <!-- Dashboard Content -->
        @include('user.pages.dashboard.dashboard-user.index')

        <!-- Berita Content -->
        @include('user.pages.dashboard.articles.index')

        {{-- resume content --}}
        @if ($resume)
            @include('user.pages.dashboard.resumes.show', ['resume' => $resume])
        @else
            <div id="cv" class="content-section mt-4 d-none">
                <div class="card p-3">
                    <h5 class="mb-2">You don't have a CV yet.</h5>
                    <p class="mb-2">Silakan buat CV terlebih dahulu agar bisa melihat dan mengekspornya.</p>
                    <a href="{{ route('resumes.create') }}" class="btn btn-primary">Create CV</a>
                </div>
            </div>
        @endif

        <!-- Profile Content -->
        @include('user.pages.dashboard.profile.index')
    </div>
@endsection

@section('script')
    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(el => {
                el.classList.add('d-none');
            });

            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(el => {
                el.classList.remove('active');
            });

            // Show selected section
            document.getElementById(section).classList.remove('d-none');

            // Add active class to clicked nav link
            document.getElementById('nav-' + section).classList.add('active');
        }

        // Initialize dashboard as active section
        document.addEventListener('DOMContentLoaded', function() {
            showSection('dashboard');
        });
    </script>
    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(el => {
                el.classList.add('d-none');
            });

            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(el => {
                el.classList.remove('active');
            });

            // Show selected section if exists
            const sectionEl = document.getElementById(section);
            if (sectionEl) {
                sectionEl.classList.remove('d-none');
            }

            // Add active class to clicked nav link if exists
            const navEl = document.getElementById('nav-' + section);
            if (navEl) {
                navEl.classList.add('active');
            }
        }

        // Initialize dashboard as active section
        document.addEventListener('DOMContentLoaded', function() {
            // baca parameter 'tab' yang dikirim dari controller (default 'dashboard')
            const activeTab = "{{ request()->get('tab', 'dashboard') }}";
            // pastikan ada section dengan id activeTab, kalau tidak fallback ke 'dashboard'
            if (!document.getElementById(activeTab)) {
                showSection('dashboard');
            } else {
                showSection(activeTab);
                // Jika ingin scroll ke section:
                // document.getElementById(activeTab).scrollIntoView({behavior: 'smooth'});
            }
        });
    </script>
@endsection
