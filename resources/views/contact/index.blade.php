<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        </head>
        <body class="bg-dark">
            <div class="container">
                <div class="main container-fluid">
                    <div class="row bg-light text-dark py-5">
                        <div class="col-md-8 offset-md-2">
                            <h2 class="fs-1 mb-5 text-center fw-bold">お問い合わせ</h2>
                            <form method="post" action="{{ route('contact.confirm') }}">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="sender" placeholder="名前（必須）" value="{{ old('sender') }}">
                                    @if ($errors->has('sender'))
                                        <p class="error-message">{{ $errors->first('sender') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="email" placeholder="メールアドレス（必須）" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <p class="error-message">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <textarea class="form-control" name="body" rows="5" placeholder="メッセージを入力してください">{{ old('body') }}</textarea>
                                    @if ($errors->has('body'))
                                        <p class="error-message">{{ $errors->first('body') }}</p>
                                    @endif
                                </div>
                                <div class="text-center pt-4 col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary">入力内容確認</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>