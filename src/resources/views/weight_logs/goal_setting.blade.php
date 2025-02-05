<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
</head>

<body>
    <header>
        <h1>Pigly</h1>

        <a href="/weight_logs/goal_setting">目標体重設定</a>
        <a href="/login">ログアウト</a>
    </header>

    <div class="content">
        <form action="/weight_logs/update" method="post">
        <h2>目標体重設定</h2>
        <input type="number" name="eight_target" value="{{$weight_target->target_weight}}"><span>kg</span>

        <a href="/weight_logs">戻る</a>
        <button class="form__button-submit" type="submit">更新</button>
    </form>
    </div>

</body>

</html>