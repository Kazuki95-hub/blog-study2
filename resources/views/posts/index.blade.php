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
                <div class="col-4 pb-2">
                    <form action="{{ route('posts.index') }}" method="GET" class="d-flex">
                        <input type= "text" name="keyword" value="{{ $keyword }}">
                        <input type= "submit" value= "検索" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class = 'posts row row-cols-1 row-cols-md-3 g-4 px-4'>
                @foreach($posts as $post)
                <div class="col">
                    <div class="card ">
                        <div class="card-header">
                            {{ $post->category->name }}
                        </div>
                        <div class ="card border-light mb-3">
                            <h2 class='card-title'>
                                <a href="/posts/{{ $post->id }}" class="card-body">{{ $post->title }}</a>
                            </h2>
                            <div class='post'>
                                <p class ='body'>
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
                <div class='paginate px-4'>
                    {{ $posts->links() }}
                </div>
            <a href='/posts/create' class="btn btn-light">create</a>
            <div>
                ログインユーザー:{{ Auth::user()->name }}
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 px-4">
                <div class="col">
                    <a class="btn btn-primary" href="https://twitter.com/intent/tweet?url={{ urlencode(url('/posts/' . $post->id)) }}" rel="nofollow noopener" target="_blank">
                        <svg width="16" height="16" viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="white"/>
                        </svg>
                        <div>
                            共有
                        </div>
                    </a>
                    <a class="btn btn-primary" href="https://social-plugins.line.me/lineit/share?url={{ urlencode(url('/posts/' . $post->id)) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-line" viewBox="0 0 16 16">
                            <path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"/>
                        </svg>
                        <div>
                            共有
                        </div>
                    </a>
                    <a class="btn btn-primary" href="/contact" rel="nofollow noopener" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <div>
                            問い合わせ
                        </div>
                    </a>
                </div>
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