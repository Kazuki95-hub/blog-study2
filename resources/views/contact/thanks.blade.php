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
            <div class="container" style="max-width:600px;">
                <h2 class="text-center m-4">送信完了しました。</h2>
                <p class="text-center mt-3">お問い合わせありがとうございました。</p>
                <p class="text-center mt-3">
                    <a href="/">トップに戻る</a>
                </p>
            </div>
        </body>
    </x-app-layout>
</html>