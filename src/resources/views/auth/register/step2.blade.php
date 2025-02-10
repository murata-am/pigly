<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/step2.css') }}">
</head>

<body>
<div class="content">
    <header class="header">
        <h1>Pigly</h1>
    </header>
    <p class="head_inner">新規会員登録</p>
    <p class="head_sub_inner">STEP2 体重データの入力</p>

    <form class="form_group" action="/register/step2" method="post">
        @csrf
        <div class="form__inner">
            <label for="weight" class="form__label">現在の体重</label>
            <input type="number" id="weight" name="weight" placeholder="現在の体重を入力" value="{{ old('weight') }}" />kg
        </div>
        <div class="form__error">
            @error('weight')
                {{ $message }}
            @enderror
        </div>
        <div class="form__inner">
            <label for="target_weight" class="form__label">目標の体重</label>
            <input type="number" id="target_weight" name="target_weight" placeholder="目標の体重を入力"
                value="{{ old('target_weight') }}" />kg
        </div>
        <div class="form__error">
            @error('target_weight')
                {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">アカウント作成</button>
        </div>
    </form>
</div>
</body>

</html>