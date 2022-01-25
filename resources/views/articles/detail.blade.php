@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $article['title'] }}</h5>
            <div class="card-substitle text-muted small mb-2">
                {{ $article->created_at->diffForHumans() }}
                Category: <b>{{ $article->category->name }}</b>
            </div>
            <p class="card-text">{{ $article->body }}</p>
            <a class="btn btn-warning" href="{{ url("/articles/delete/$article->id") }}">Delete</a>
            </div>
        </div>
        <ul class="list-group">
            <li class="list-group-item active">
            <b>Comments ({{ count($article->comments) }})</b>
            </li>
            @foreach($article->comments as $comment)
            <li class="list-group-item">
            {{ $comment->content }}
            </li>
            @endforeach
            </ul>
            <form action="{{ url('/comments/add') }}" method="post">
                @csrf
                <input type="hidden" value="{{ $article->id }}"  name="article_id">
                <textarea name="content" class="form-control mb-2" placeholder="enter comment"></textarea>
                <input type="submit" value="Add Comment" class="btn btn-primary">
            </form>


            </div>

    </div>
</div>
@endsection
