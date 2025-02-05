<?php

use App\Http\Controllers\WeightLogController;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register/step1', [WeightLogController::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [WeightLogController::class, 'processStep1']);

Route::get('/register/step2', [WeightLogController::class, 'showStep2'])->name('auth.register.step2');
Route::post('/register/step2', [WeightLogController::class, 'processStep2']);

Route::get('/login', [WeightLogController::class, 'login']);


Route::middleware('auth')->group(function () {
    Route::get('/weight_logs', [WeightLogController::class, 'weight_logs'])->name('weight_logs');
});

Route::get('weight_logs/goal_setting', [WeightLogController::class, 'showGoalSetting']);
Route::post('weight_logs/update', [WeightLogController::class, 'updateGoalSetting']);