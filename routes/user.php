<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\QuizController;
use App\Http\Controllers\User\LectureController;
use App\Http\Controllers\User\MyCourseController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\MyProfileController;
use App\Http\Controllers\User\CertificateController;
use App\Http\Controllers\User\CourseByCatController;
use App\Http\Controllers\User\CourseEnrollController;

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
Route::middleware(['auth','user'])->prefix('user')->group(function(){
    // Route::prefix('my-profile')->group(function(){
    //     Route::prefix('layout')->group(function(){
    //         Route::get('/', [LayoutController::class, 'create'])->name('admin.layout.create');
    //         Route::post('/dark', [LayoutController::class, 'layoutDark'])->name('layout.layoutDark');
    //         Route::post('/light', [LayoutController::class, 'layoutLight'])->name('layout.layoutLight');
    //         Route::post('/submit-button', [LayoutController::class, 'submitBtn'])->name('layout.submitBtn');
    //         Route::post('/add-button', [LayoutController::class, 'createBtn'])->name('layout.createBtn');
    //         Route::post('/table', [LayoutController::class, 'table'])->name('layout.table');
    //         Route::post('/table-bg', [LayoutController::class, 'tableBg'])->name('layout.tableBg');
    //         Route::post('/table-text', [LayoutController::class, 'tableText'])->name('layout.tableText');
    //         Route::post('/logo-header', [LayoutController::class, 'logoHeaderStore'])->name('admin.logoHeaderStore');
    //         Route::post('/navbar-header', [LayoutController::class, 'navbarHeaderStore'])->name('admin.navbarHeaderStore');
    //         Route::post('/sidebar', [LayoutController::class, 'sidebarStore'])->name('admin.sidebarStore');
    //         Route::post('/background', [LayoutController::class, 'backgroundStore'])->name('admin.backgroundStore');
    //     });


    //     Route::prefix('profile')->group(function(){
    //         Route::get('/', [ProfileController::class, 'index'])->name('admin.myProfile.profile.index');
    //         Route::post('/update', [ProfileController::class, 'update'])->name('admin.myProfile.profile.update');
    //     });
    // });

    Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::prefix('course-enroll')->controller(CourseEnrollController::class)->group(function () {
        Route::post('/courseEnroll', 'enroll')->name('user.courseEnroll');
    });

    Route::resource('/my-course', MyCourseController::class,[
        'names' => [
            'index' => 'user.myCourse.index',
        ]
    ]);

    Route::prefix('/lecture')->controller(LectureController::class)->group(function () {
        Route::get('/show/{id}', 'show')->name('user.lecture.show');
        Route::get('/lecture-play/{course_id}/{lecture_id}', 'lecturePlay')->name('user.lecture.lecturePlay');
        Route::post('/lectureComplete', 'lectureComplete')->name('user.lecture.lectureComplete');
    });


    Route::prefix('/quiz')->controller(QuizController::class)->group(function () {
        Route::get('/quiz/{course_id}', 'quiz')->name('user.quiz.quiz');
        // Route::post('/quiz', 'quiz')->name('user.quiz.quizz');
        Route::post('/ans', 'ans')->name('user.quiz.ans');
        Route::get('/result/{userId}/{courseId}', 'result')->name('user.quiz.result');
        // Route::post('/lectureComplete', 'lectureComplete')->name('user.quiz.lectureComplete');
    });

    Route::prefix('/certificate')->controller(CertificateController::class)->group(function (){
        Route::get('/', 'index')->name('user.certificate.index');
        Route::get('/certificate/{courseId}', 'show')->name('user.certificate.show');
    });

    Route::prefix('/my-profile')->controller(MyProfileController::class)->group(function (){
        Route::get('/edit', 'edit')->name('user.myProfile.edit');
        Route::post('/update', 'update')->name('user.myProfile.update');
    });
   

    // Route::get('/lecture-play/{course_id}/{lecture_id}', [LectureController::class, 'lecturePlay'])->name('user.lecture.lecturePlay');
    // Route::post('/lectureComplete', [LectureController::class, 'lectureComplete'])->name('user.lecture.lectureComplete');


});

