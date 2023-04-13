<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\CourseByCatController;
use App\Http\Controllers\Frontend\CourseReviewController;
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


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/course-details/{id}', [IndexController::class, 'courseDetails'])->name('courseDetails');
Route::resource('/course-review', CourseReviewController::class);

Route::controller(CourseByCatController::class)->prefix('course-by-cat')->group(function(){
    Route::get('/{id}','index')->name('courseByCat');
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
