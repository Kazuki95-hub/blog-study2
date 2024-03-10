<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <x-slot name="header">
            <h2 class ="font-semibold text-xl text-gray-800 leading-tight">Teratail</h2>
        </x-slot>
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @foreach($questions as $question)
        <div>
            <a href="https://teratail.com/questions/{{ $question['id'] }}">
                    {{ $question['title'] }}
            </a>
        </div>
        @endforeach
    </body>
    </x-app-layout>
</html>
