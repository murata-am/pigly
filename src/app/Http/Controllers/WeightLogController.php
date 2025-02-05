<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\Http\Requests\WeightLogRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function showStep1()
    {
        return view('auth.register.step1');
    }
    public function processStep1(Step1Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session(['register_user_id' => $user->id]);
        return redirect()->route('auth.register.step2');
    }

    public function showStep2()
    {
        return view('auth.register.step2');
    }
    public function processStep2(Step2Request $request)
    {
        $user_id = session('register_user_id');
        if (!$user_id) {
            return redirect()->route('register.step1')->withErrors('ステップ1の登録が必要です。');
        }
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->route('register.step1')->withErrors('ユーザーが見つかりません。');
        }

        WeightLog::create([
        'user_id' => $user->id,
        'weight' => $request->weight,
        'date' => now(),
        ]);
        WeightTarget::create([
        'user_id' => $user->id,
        'target_weight' => $request->target_weight,
        ]);
        // セッションデータを削除
        session()->forget('register_user_id');

        Auth::loginUsingId($user_id);

        return redirect()->route('weight_logs');

    }

    public function login()
    {
        return view('auth.login');
    }

    public function weight_logs()
    {
        $user = Auth::user();
        $weight_logs = WeightLog::where('user_id', auth()->id())->paginate(8);
        $latest_weight = WeightLog::where('user_id', auth()->id())->orderBy('created_at', 'desc')->first();
        $weight_target =WeightTarget::where('user_id', auth()->id())->first();

        return view('weight_logs', compact('weight_logs', 'weight_target', 'latest_weight'));
    }

    public function showGoalSetting()
    {
        $weight_target = WeightTarget::where('user_id', auth()->id())->first();
        return view('weight_logs.goal_setting', compact('weight_target'));

    }

    public function updateGoalSetting(WeightTargetRequest $request)
    {
        $WeightTargets = WeightTarget::where('user_id', auth()->id())->first();
        $WeightTargets->target_weight = $request->target_weight;
        $WeightTargets->save();

        return redirect()->route('weight-logs');
    }


}
