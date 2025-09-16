@extends('user.layouts.app')

@section('content')
    <section id="galleries" class="services section">
        {{-- fetch gallery --}}
        <h1>Gallery</h1>
        <div class="row g-4">
            @foreach ($galleries as $gallery)
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $gallery->title }}</h5>
                            @if ($gallery->images->first())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image) }}"
                                    alt="{{ $gallery->title }}" style="width:120px; height:auto; object-fit:cover;">
                            @else
                                -
                            @endif
                            <p class="card-text">Author: {{ $gallery->user ? $gallery->user->name : '-' }}</p>   
                            <p class="card-text">Created at: {{ $gallery->created_at->format('Y-m-d') }}</p>
                            <a href="{{ route('galleries.show', $gallery) }}" class="btn btn-warning">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
    </section>
@endsection
