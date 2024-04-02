<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
        </head>
        
        <body>
            <div style="margin-left:5px">
                <h1>Blog Name</h1>
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="title">
                        <h2>Title</h2>
                        <input style="width:300px;" type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                    </div>
                    <div class="body">
                        <h2>Body</h2>
                        <textarea style="width:90%; height:500px;" name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ $post->body }}</textarea>
                        <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                    </div>
                    <input type="submit" value="更新"/>
                </form>
                <div class="footer">
                    <a href="/posts/{{ $post->id }}">戻る</a>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>