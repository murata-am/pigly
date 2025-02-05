<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
<div class="content">
    <header class="header">
        <h1>Pigly</h1>
    </header>
    <p class="head_inner">ログイン</p>

    <form action="/login" method="post">
        @csrf
        <div class="form_group">
            <div class="form__inner">
                <label for="email" class="form__label">メールアドレス</label>
                <input type="email" id="email" name="email" placeholder="メールアドレスを入力" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__inner">
                <label for="password" class="form__label">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力" value="{{ old('password') }}" />
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
        </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
    </form>
    <a class="register-button" href="/register/step1">アカウント作成はこちら</a>
</div>
</body>

</html>