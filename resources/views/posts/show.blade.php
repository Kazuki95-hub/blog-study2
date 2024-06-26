<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Posts</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        
        <body>
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    {{--<p>{{ $post->body }}</p>--}}   
                    <p>{!! nl2br(e($post->body)) !!}</p>
                </div>
            </div>
            @if(Auth::check())
            <div class="edit">
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary">
                    編集
                </a>
            </div>
            @endif
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>