<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
        <head>
            <meta charset="utf-8">
            <title>Blog</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        </x-slot>
        <body>
            <div class="row">
            @php $previousCategory = null; @endphp
            @foreach($posts as $post)
                @if ($post->category->name !== $previousCategory)
                    <h1>{{ $post->category->name }}</h1>
                 @php $previousCategory = $post->category->name; @endphp <!-- 前のカテゴリを更新 -->
            @endif
            
            <div class="col-md-4">
            <div class = 'posts card'>
                <h2 class='title'>
                <div class="card-header">
                    {{ $post->category->name }}
                </div>
                </h2>
                <div class='paginate'>
                {{ $posts->links() }}
                </div>
                <div class= 'post'>
                    <h2 class = 'title'>
                        <a href="/posts/{{ $post->id }}" class="card-body">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class = 'body'>{{ $post->body }}</p>
                    <!--<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>-->
                    @if(Auth::check())
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method= "post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                    @endif
                </div>
            </div>
            </div>
            @endforeach
            </div>
            <a href='/posts/create'>create</a>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
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