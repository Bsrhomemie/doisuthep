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
use App\Http\Controllers\HomeController;

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

Route::get('/welcom', function () {
    return view('welcome');
});

Auth::routes();
 
Route::get('/home', [HomeController::class, 'index'])->name('home');
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
Route::post('/content/add/', [ContentController::Class,'addContet']);
Route::get('/content/form_edit/{type}/{id}', [ContentController::Class,'viewContet']);
Route::post('content/edit/', [ContentController::Class,'editContet']);
Route::post('content/delete', [ContentController::Class,'deleteContet']);

Route::get('/admin/product/', [AdminController::Class,'listProtuct']);
Route::get('/product/form/', [ProductController::Class,'viewProtuct']);
Route::post('/product/add/', [ProductController::Class,'addProtuct']);
Route::get('/product/form_edit/{id}', [ProductController::Class,'viewProtuct']);
Route::post('product/edit/', [ProductController::Class,'editProduct']);
Route::post('product/delete', [ProductController::Class,'deleteProduct']);

Route::get('/admin/work', [AdminController::Class,'listWork']);
