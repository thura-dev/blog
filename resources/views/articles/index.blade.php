@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session('info'))
    <div class="alert alert-info">
        {{ Session('info') }}
    </div>
    @endif
    {{ $articles->links() }}
    @foreach($articles as $article)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article['title'] }}</h5>
            <div class="card-subtitle text-muted small mb-2">
                {{ $article->created_at->diffForHumans() }}

            <p class="card-text">{{ $article->body }}</p>
            </div>

        </div>
        <a class="text-link" href="{{ url("articles/detail/$article->id") }}">Viewe Detail &raquo;</a>
    </div>
    @endforeach
</div>
@endsection
