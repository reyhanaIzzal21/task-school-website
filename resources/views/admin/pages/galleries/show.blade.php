@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Gallery</h1>

        <div class="mb-3 d-flex flex-wrap">
            @foreach ($gallery->images as $image)
                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $gallery->title }}"
                    style="max-width:300px; margin-right:8px; margin-bottom:8px;">
            @endforeach
        </div>


        <div class="mb-3">
            <h3>{{ $gallery->title }}</h3>
            <p>Author: {{ $gallery->user ? $gallery->user->name : '-' }}</p>
            <p>Created at: {{ $gallery->created_at }}</p>
        </div>

        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning">Edit</a>
    </div>
@endsection
