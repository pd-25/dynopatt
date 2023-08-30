<?php

use App\Http\Controllers\admin\course\CourseController;
use App\Http\Controllers\CategoryController;
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
Route::get('clear_cache', function () {

    \Artisan::call('cache:clear');

    dd("Cache is cleared");

});
Route::get('link', function () {

    \Artisan::call('storage:link');

    dd("linked");

});

Route::get('route', function () {

    \Artisan::call('route:clear');

    dd("route-clear");

});

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'],function(){
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('courses', CourseController::class);
Route::resource('categories', CategoryController::class);
Route::post('/site-update', [App\Http\Controllers\HomeController::class, 'siteUpdate'])->name('siteinfo.update');


});

