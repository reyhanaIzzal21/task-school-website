@extends('user.layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p><small>By {{ $article->user->name }} | {{ $article->created_at->format('d M Y') }}</small></p>
    <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}" class="img-fluid mb-3">
    <div>{!! nl2br(e($article->content)) !!}</div>
</div>
@endsection
