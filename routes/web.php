<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SuthepController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomevideoController;
use App\Http\Controllers\DoisuthepDBController;

use Illuminate\Support\Facades\Artisan;
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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguageController@switchLang']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [UserController::Class, 'index']);
Route::get('/news/{type}', [UserController::Class, 'news']);
Route::get('/news-detail/{type}/{id}', [UserController::Class, 'news_detail']);
Route::get('/news/{type}', [UserController::Class, 'news']);
Route::get('/services', [UserController::Class, 'services']);
Route::get('/suthep', [UserController::Class, 'suthep']);
Route::get('/empolyee', [UserController::Class, 'empolyee']);
Route::get('/database', [DoisuthepDBController::Class, 'search']);
Route::get('/databasel/{type}/{id}', [UserController::Class, 'database_detail']);


Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/admin', [AdminController::Class, 'index'])->name('admin');;
Route::get('/admin/content/{type}', [AdminController::Class, 'listContent']);
Route::get('/content/form/{type}', [ContentController::Class, 'viewContet']);
Route::post('/content/add/', [ContentController::Class, 'addContet']);
Route::get('/content/form_edit/{type}/{id}', [ContentController::Class, 'viewContet']);
Route::post('content/edit/', [ContentController::Class, 'editContet']);
Route::post('content/delete', [ContentController::Class, 'deleteContet']);

Route::get('/admin/product/', [AdminController::Class, 'listProtuct']);

Route::get('/product/form/', [ProductController::Class, 'viewProtuct']);
Route::post('/product/add/', [ProductController::Class, 'addProtuct']);
Route::get('/product/form_edit/{id}', [ProductController::Class, 'viewProtuct']);
Route::post('product/edit/', [ProductController::Class, 'editProduct']);
Route::post('product/delete', [ProductController::Class, 'deleteProduct']);
Route::get('/admin/work', [AdminController::Class, 'listWork']);

Route::get('/admin/video/', [AdminController::Class, 'listVideo']);
Route::post('video/edit/', [HomevideoController::Class, 'editVideo']);

Route::get('/admin/animal', 'App\Http\Controllers\AnimalController@index');

Route::get('/plant', 'App\Http\Controllers\PlantController@index');
//Database Doi Suthep
Route::resource('database_doisuthep', DatabaseController::class);

//Clear Cache facade value:
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

//Migrate Run:
// Route::get('/migrate', function() {
//     $exitCode = Artisan::call('migrate',[
//         '--force' => true
//      ]);
//     return '<h1>migrate made</h1>';
// });

// Route::get('/migrate-roll', function() {
//     $exitCode = Artisan::call('migrate:rollback',[
//         '--force' => true
//      ]);
//     return '<h1>migrate roll made</h1>';
// });

// //Artisan model:
// Route::get('/model-make-p', function() {
//     $exitCode = Artisan::call('make:model Picture -m');
//     return '<h1>Model made</h1>';
// });

// //Artisan model:
// Route::get('/model-make-dp', function() {
//     $exitCode = Artisan::call('make:model Plant -m');
//     return '<h1>Model made</h1>';
// });

// //Artisan model:
// Route::get('/model-make-da', function() {
//     $exitCode = Artisan::call('make:model Animal -m');
//     return '<h1>Model made</h1>';
// });

// //Artisan model:
// Route::get('/model-make-db', function() {
//     $exitCode = Artisan::call('make:model Doisuthep_db -m');
//     return '<h1>Model made</h1>';
// });

// //Artisan model:
// Route::get('/model-make-hv', function() {
//     $exitCode = Artisan::call('make:model Homevideo');
//     return '<h1>Model made</h1>';
// });

// Artisan model:
// Route::get('/model-make-controller', function() {
//     $exitCode = Artisan::call('make:controller AnimalController --model=Animal');
//     return '<h1>Model made</h1>';
// });


Route::get('/admin/database/plants', [PlantController::Class, 'indexAdmin']);
Route::get('/database/form/plants', [PlantController::Class, 'create']);
Route::post('/database/add/plants', [PlantController::Class, 'store']);
Route::get('/database/form_edit/plants/{plant}', [PlantController::Class, 'show']);
Route::post('database/edit/plants', [PlantController::Class, 'update']);
Route::delete('database/delete/plants', [PlantController::Class, 'destroy']);
Route::get('/database/plants/{id}', [UserController::Class, 'database_detail']);


Route::get('/admin/database/animals', [AnimalController::Class, 'indexAdmin']);
Route::get('/database/form/animals', [AnimalController::Class, 'create']);
Route::post('/database/add/animals', [AnimalController::Class, 'store']);
Route::get('/database/form_edit/animals/{animal}', [AnimalController::Class, 'show']);
Route::post('database/edit/animals', [AnimalController::Class, 'update']);
Route::delete('database/delete/animals', [AnimalController::Class, 'destroy']);