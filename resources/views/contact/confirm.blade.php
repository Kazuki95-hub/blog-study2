<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        </head>
        <body>
            <div>
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <label>名前</label>
                        {{ $inputs['sender'] }}
                    <input name="sender" value="{{ $inputs['sender'] }}" type="hidden">
                    <label>メールアドレス</label>
                        {{ $inputs['email'] }}
                    <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                    <label>お問い合わせ内容</label>
                        {!! nl2br(e($inputs['body'])) !!}
                    <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                    <button type="submit" name="action" value="back">入力内容修正</button>
                    <button type="submit" name="action" value="submit">送信する</button>
                </form>
            </div>
        </body>
    </x-app-layout>
</html>