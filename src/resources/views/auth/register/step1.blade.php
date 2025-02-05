<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/step1.css') }}">
</head>
<body>
    <div class="content">
        <header class="header">
            <h1>Pigly</h1>
        </header>
        <h2 class="head_inner">新規会員登録</h2>
        <p class="head_sub_inner">STEP1 アカウント情報の登録</p>

        <form class="form_group" action="{{ route('register.step1') }}" method="post">
            @csrf
                <div class="form__inner">
                    <label for="name" class="form__label">お名前</label>
                    <input type="text" id="name" name="name" placeholder="名前を入力" value="{{ old('name') }}" />
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
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
                <div class="form__button">
                    <button class="form__button-submit" type="submit">次に進む</button>
                </div>
        </form>
            <a class="login-button" href="/login" >ログインはこちら</a>
        </div>
</body>
</html>