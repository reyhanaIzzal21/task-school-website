@extends('user.layouts.app')

@section('style')
    <style>
        .article-card {
            transition: 0.3s ease-in-out;
            border-radius: 12px;
            overflow: hidden;
        }

        .article-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 26px rgba(0, 0, 0, 0.15);
        }

        .article-thumbnail {
            height: 200px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <section id="articles" class="section py-5 mt-5">
        <div class="container">

            <div class="container section-title" data-aos="fade-up">
                <h2>Kopetensi Keahlian</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <!-- Articles Grid -->
            <div class="row g-4">
                @forelse ($articles as $article)
                    <div class="col-sm-6 col-lg-4">
                        <article class="card border-0 shadow-sm h-100 article-card">

                            <!-- Thumbnail -->
                            @if (!empty($article->thumbnail))
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}"
                                    class="card-img-top article-thumbnail">
                            @else
                                <img src="{{ asset('images/default-article.png') }}" alt="default article"
                                    class="card-img-top article-thumbnail">
                            @endif

                            <!-- Content -->
                            <div class="card-body d-flex flex-column">

                                <!-- Category & Date -->
                                <p class="text-muted small mb-1">
                                    <i class="bi bi-tag"></i> {{ $article->category->name ?? 'Uncategorized' }}
                                    &nbsp;•&nbsp;
                                    <i class="bi bi-calendar-event"></i> {{ $article->created_at->format('d M Y') }}
                                </p>

                                <!-- Title -->
                                <h5 class="card-title fw-semibold mb-2">
                                    {{ $article->title }}
                                </h5>

                                <!-- Author -->
                                <p class="small text-muted mb-3">
                                    <i class="bi bi-person-circle"></i>
                                    {{ $article->user->name ?? 'Admin' }}
                                </p>

                                <!-- Excerpt -->
                                <p class="card-text flex-grow-1 text-secondary">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($article->content ?? ($article->excerpt ?? '')), 140) !!}
                                </p>

                                <!-- Button -->
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="btn btn-dark btn-sm rounded-3 mt-3">
                                    Baca Selengkapnya →
                                </a>
                            </div>

                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-4">
                            Belum ada artikel yang tersedia.
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $articles->links() }}
            </div>

        </div>
    </section>
@endsection
