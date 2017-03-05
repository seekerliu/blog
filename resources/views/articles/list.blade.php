@extends('layouts.app')

@section('content')
    <div class="main-layout col-md-8 col-md-offset-2">
        @foreach($articles as $article)
        <div class="article-list">
            <a href="/articles/{{$article->id}}">
                <h3 class="article-title">{{$article->title}}</h3>
                <h4 class="article-info"><small>{{$article->user->name}} {{$article->created_at}}</small></h4>
            </a>
        </div>
        @endforeach
        {{$articles->links()}}
    </div>
@endsection
