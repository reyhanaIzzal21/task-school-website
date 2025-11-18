@extends('user.layouts.app')

@section('content')
    <div class="container py-5 mt-5">

        <!-- Back Button -->
        <a href="{{ route('articles.index') }}" class="btn btn-outline-dark mb-4">
            ← Kembali ke Daftar Artikel
        </a>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Article Thumbnail -->
                @if ($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                        class="img-fluid rounded shadow mb-4" style="width: 100%; max-height: 420px; object-fit: cover;">
                @endif

                <!-- Title -->
                <h1 class="fw-bold mb-3">{{ $article->title }}</h1>

                <!-- Meta Data -->
                <div class="d-flex align-items-center text-muted mb-4" style="font-size: 15px;">
                    <span class="me-3">
                        <i class="bi bi-person-circle"></i>
                        {{ $article->user->name ?? 'Unknown User' }}
                    </span>
                    <span class="me-3">
                        <i class="bi bi-bookmark"></i>
                        {{ $article->category->name ?? 'No Category' }}
                    </span>
                    <span>
                        <i class="bi bi-eye"></i>
                        {{ $article->view_count }} Views
                    </span>
                </div>

                <!-- Content -->
                <div class="article-content mb-5" style="font-size: 17px; line-height: 1.7;">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <!-- Footer Info -->
                <hr>
                <div class="text-muted">
                    Dipublikasikan pada: {{ $article->created_at->format('d M Y') }}
                    <br>
                    Terakhir diupdate: {{ $article->updated_at->format('d M Y') }}
                </div>

            </div>
        </div>
    </div>
@endsection
