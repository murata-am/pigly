<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/weight_log.css') }}">
</head>
<body>
    <header>
        <div class="header-left">
            <h1>PiGly</h1>
        </div>
        @if (Auth::check())
                <div class="header-right">
                    <a href="/weight_logs/goal_setting" class="button">目標体重設定</a>
                    <a href="/login" class="button">ログアウト</a>
                </div>
            </header>

                <div class="content_inner">
                    <div class="content__label">目標体重</div>
                    <p class="weight_target">{{ $weight_target->weight_target ?? '未設定' }}kg</p>

                    <div class="content__label">目標まで</div>
                    <p class="remaining_weight">
                        @if ($latest_weight && $weight_target)
                            {{ max(0, $latest_weight->weight - $weight_target->weight_target) }} kg
                        @else
                            記録なし
                        @endif
                    </p>
                    <div class="content__label">最新体重</div>
                    <p class="latest_weight_log">{{ $latest_weight->weight ?? '記録なし' }} kg</p>
                </div>

                <div class="content__table">
                <form action="/weight_logs/search" method="get">
                    <input type="date" id="start_date" name="start_date" required>～<input type="date" id="end_date" name="end_date" required>
                    <button type="submit" class="submit-button">検索</button>
                    <a href="/weight_logs" class="button">リセット</a>
                </form>
                // 検索結果の内容が来る

                <form action="/weight_logs/create" method="get">
                    <button class="add-form__button-submit" type="submit">データ追加</button>
                </form>
                </div>

                <table>
                    <tr>
                        <th class="log_label">日付</th>
                        <th class="log_label">体重</th>
                        <th class="log_label">食事摂取カロリー</th>
                        <th class="log_label">運動時間</th>
                    </tr>
                    @foreach ($weight_logs as $weight_log)
                        <tr >
                            <td class="log_data">{{$weight_log->created_at->format('Y-m-d')}}</td>
                            <td class="log_data">{{$weight_log->weight}}</td>
                            <td class="log_data">{{$weight_log->calories}}</td>
                            <td class="log_data">{{$weight_log->exercise_time}}</td>
                            <td class="edit_icon">
                                <a href="/weight_logs/{{ $weight_log->id }}/update">更新アイコン</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $weight_logs->links() }}
        @endif
</body>
</html>