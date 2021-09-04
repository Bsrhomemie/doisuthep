<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SuthepController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WorkController;
// use App\Http\Controllers\LanguageController;
// use App\Models\User;

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

//parameters
// Route::get('post/{slug}', [UserController::Class,'show'])->name('show');

// Route::resource('content', ContentController::Class);

// Route::get('/home', [UserController::Class,'index']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);
Route::get('/', [UserController::Class,'index']);
Route::get('/suthep', [SuthepController::Class,'index']);
Route::get('/service', [KnowledgeController::Class,'index']);
Route::get('/empolyee/{type}', [StaffController::Class,'index']);
Route::get('/admin', [AdminController::Class,'index'])->name('admin');;
Route::get('/admin/content', [AdminController::Class,'listContent']);
Route::get('/admin/product', [AdminController::Class,'listProtuct']);
Route::get('/admin/vedio', [AdminController::Class,'listVedio']);
Route::get('/admin/work', [AdminController::Class,'listWork']);
Route::resource('content', ContentController::Class);
Route::resource('product', ProductController::Class);
Route::resource('work', WorkController::Class);

// Route::resource('admin', AdminController::Class);

// Route::get('/admin-content', [AdminController::Class,'viewContet'])->name('addmin.content');

