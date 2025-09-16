@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Artikel</h1>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">+ Tambah Artikel</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Thumbnail</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                    <tr>
                        <td>{{ $loop->iteration + ($articles->currentPage() - 1) * $articles->perPage() }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ Str::limit($article->content, 100) }}</td>
                        <td>
                            @if ($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" width="100">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>
                            <a href="{{ route('articles.show', $article->slug) }}" target="_blank"
                                class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('admin.articles.edit', $article->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus artikel ini?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <form action="{{ route('admin.articles.toggleStatus', $article->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                @if ($article->status === 'draft')
                                    <button class="btn btn-success btn-sm">Publish</button>
                                @else
                                    <button class="btn btn-secondary btn-sm">Draft</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada artikel</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $articles->links() }}
    </div>
@endsection
