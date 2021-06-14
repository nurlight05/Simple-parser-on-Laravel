<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\Admin\SettingController;

use GuzzleHttp\Client;
use App\Models\Log;
use App\Models\News;
use App\Models\Image;

Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('main.index');

    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/logs', [LogsController::class, 'index'])->name('logs.index');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
});
