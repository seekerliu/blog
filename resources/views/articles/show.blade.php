@extends('layouts.app')

@section('content')
    <link href="/vendor/social-share/css/share.min.css" rel="stylesheet"/>
    <div class="main-layout col-md-8 col-md-offset-2">
        <div class="article">
            <div class="article-header">
                <h2>{{$article->title}}</h2>
                <h4><small>{{$article->user->name}}</small> <small>{{$article->created_at}}</small></h4>
            </div>

            <div class="article-content">
                {!! $article->content !!}
            </div>

            <div class="article-footer">
                <div class="social-share"></div>
            </div>
        </div>
    </div>
@endsection
