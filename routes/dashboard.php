<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

//
Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

// Files
Route::get('files/get-config/{file_config_key}', [FileController::class, 'getConfig'])->name('files.getConfig');
Route::delete('files/delete/{file_id}', [FileController::class, 'delete'])->name('files.delete');
Route::post('files/store-temp-file', [FileController::class, 'storeTempFile'])->name('files.storeTempFile');

// Translations
Route::get('/translations', [Barryvdh\TranslationManager\Controller::class, 'getIndex'])->name('translation.manager');
Route::get('/translations/view/{group?}', [Barryvdh\TranslationManager\Controller::class, 'getView'])->name('translation.group');

// Users
Route::resource('users', UserController::class);
Route::get('users/dataTable/get-list', [UserController::class, 'getListData'])->name('users.getListData');

// Articles
Route::resource('articles', ArticleController::class);
Route::get('articles/dataTable/get-list', [ArticleController::class, 'getListData'])->name('articles.getListData');

// Profile
Route::get('profile',  [ProfileController::class, 'index'])->name('profile.index');

