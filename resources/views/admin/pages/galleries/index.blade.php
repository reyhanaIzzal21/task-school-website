@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Galleries</h1>
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Tambah Gallery</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($galleries->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th style="width: 180px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleries as $index => $gallery)
                        <tr>
                            <td>{{ $galleries->firstItem() + $index }}</td>
                            <td>
                                @if ($gallery->images->first())
                                    <img src="{{ asset('storage/' . $gallery->images->first()->image) }}"
                                        alt="{{ $gallery->title }}" style="width:120px; height:auto; object-fit:cover;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->user ? $gallery->user->name : '-' }}</td>
                            <td>{{ $gallery->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.galleries.show', $gallery) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.galleries.edit', $gallery) }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Hapus gallery ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $galleries->links() }}
        @else
            <p>Tidak ada gallery. Silakan tambahkan.</p>
        @endif
    </div>
@endsection
