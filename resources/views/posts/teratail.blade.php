<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1>APIを叩く練習で作成したページです。</h1>
            <div class="list-group">
                @foreach($questions as $question)
                <span class="list-group-item list-group-item-action ">
                    <a href="https://teratail.com/questions/{{ $question['id'] }}" class="stretched-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                        {{ $question['title'] }}
                    </a>
                </span>
               @endforeach
            </div>
        </body>
    </x-app-layout>
</html>
