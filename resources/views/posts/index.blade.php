<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
            <h2 class ="font-semibold text-xl text-gray-800 leading-tight">Index</h2>
         </x-slot>
        <head>
            <meta charset="utf-8">
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <script src="{{ asset('resources/js/app.js') }}" defer></script>
            <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
        </head>
        <!--<div>INDEX</div>-->
       
        <body>
            <div>
                <form action="{{ route('posts.index') }}" method="GET">
                    <input type= "text" name="keyword" value="{{ $keyword }}">
                    <input type= "submit" value= "検索" class="btn btn-primary">
                </form>
            </div>
            
            <div class = 'posts'>
                @foreach($posts as $post)
                <h1>BlogName</h1>
                <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <div class= 'post'>
                    <!--<h2 class = 'title'>{{ $post->title }}</h2>-->
                    <p class = 'body'>{{ $post->body }}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method= "post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
                @endforeach
            </div>
            <div class='paginate' style="display: inline-block;">
                {{ $posts->links() }}
            </div>
            <a href='/posts/create'>create</a>
            <div>ログインユーザー:{{ Auth::user()->name }}</div>
            <!--<div>-->
                {{--<!--@foreach($questions as $question)-->
            <!--        <div>-->
            <!--            <a href="https://teratail.com/questions/{{ $question['id'] }}">-->
            <!--                    {{ $question['title'] }}-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    @endforeach-->--}}
            <!--</div>-->
        </body>
    </x-app-layout>
        <script>
            function deletePost(id) {
                'use strict'
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</html>