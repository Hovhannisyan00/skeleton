<?php

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\FileController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

// Files
Route::delete('files/delete/{file_id}', [FileController::class, 'delete'])->name('files.delete');

// Translations
Route::get('/translations', [Barryvdh\TranslationManager\Controller::class, 'getIndex'])->name('translation.manager');
Route::get('/translations/view/{group?}', [Barryvdh\TranslationManager\Controller::class, 'getView'])->name('translation.group');

// Users
Route::resource('users', UserController::class);
Route::get('users/dataTable/get-list', [UserController::class, 'getListData'])->name('users.getListData');

// Roles @todo
/*Route::resource('roles', RoleController::class);
Route::get('roles/dataTable/get-list', [RoleController::class, 'getListData'])->name('roles.getListData');*/

// Articles
Route::resource('articles', ArticleController::class);
Route::get('articles/dataTable/get-list', [ArticleController::class, 'getListData'])->name('articles.getListData');
