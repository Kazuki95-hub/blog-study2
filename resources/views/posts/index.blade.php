<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            
        </head>
        <body>
            <div class="row justify-content-end">
            <div class="col-md-4">
                <form action="{{ route('posts.index') }}" method="GET">
                    <input type= "text" name="keyword" value="{{ $keyword }}">
                    <input type= "submit" value= "検索" class="btn btn-primary">
                </form>
            </div>
            </div>
            <div class = 'posts row'>
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">
                        {{ $post->category->name }}
                    </div>
                    <div class ="card border-light mb-3">
                        <h2 class='card-title'>
                        <a href="/posts/{{ $post->id }}" class="card-body">{{ $post->title }}</a>
                        </h2>
                        <div class= 'post'>
                            <p class = 'body'>
                                {{ mb_strlen($post->body) > 10 ? mb_substr($post->body, 0,10) . '...' : $post->body }}
                            </p>
                            <a href="/categories/{{ $post->category->id }}">タグ：{{ $post->category->name }}</a>
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method= "post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="deletePost({{ $post->id }})">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            
            <a href='/posts/create' class="btn btn-light">create</a>
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