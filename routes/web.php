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
Route::get('/news/{type}', [UserController::Class,'news']);
Route::get('/news-detail/{type}/{id}', [UserController::Class,'news_detail']);
Route::get('/news/{type}', [UserController::Class,'news']);
Route::get('/services', [UserController::Class,'services']);
Route::get('/suthep', [UserController::Class,'suthep']);
Route::get('/empolyee/{type}', [UserController::Class,'empolyee']);

Route::get('/admin', [AdminController::Class,'index'])->name('admin');;
Route::get('/admin/content/{type}', [AdminController::Class,'listContent']);
Route::get('/content/form/{type}', [ContentController::Class,'viewContet']);
Route::get('content/add/', [ContentController::Class,'addContet']);


// Route::get('/admin/product', [AdminController::Class,'listProtuct']);
// Route::get('/admin/vedio', [AdminController::Class,'listVedio']);
// Route::get('/admin/work', [AdminController::Class,'listWork']);
// Route::resource('product', ProductController::Class);
// Route::resource('work', WorkController::Class);

// Route::resource('admin', AdminController::Class);

// Route::get('/admin-content', [AdminController::Class,'viewContet'])->name('addmin.content');

