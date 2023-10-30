<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Auth\Role\RoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CourseCatController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VisitorInfoController;
use App\Http\Controllers\Admin\CerSignatureController;
use App\Http\Controllers\Admin\StudentHistoryController;
use App\Http\Controllers\Admin\MyProfile\LayoutController;
use App\Http\Controllers\Admin\MyProfile\ProfileController;
use App\Http\Controllers\Auth\Permission\PermissionController;

Route::prefix('my-profile')->group(function () {
    // Route::prefix('layout')->group(function(){
    //     Route::get('/', [LayoutController::class, 'create'])->name('layout.create');
    //     Route::post('/dark', [LayoutController::class, 'layoutDark'])->name('layout.layoutDark');
    //     Route::post('/light', [LayoutController::class, 'layoutLight'])->name('layout.layoutLight');
    //     Route::post('/submit-button', [LayoutController::class, 'submitBtn'])->name('layout.submitBtn');
    //     Route::post('/add-button', [LayoutController::class, 'createBtn'])->name('layout.createBtn');
    //     Route::post('/table', [LayoutController::class, 'table'])->name('layout.table');
    //     Route::post('/table-bg', [LayoutController::class, 'tableBg'])->name('layout.tableBg');
    //     Route::post('/table-text', [LayoutController::class, 'tableText'])->name('layout.tableText');
    //     Route::post('/logo-header', [LayoutController::class, 'logoHeaderStore'])->name('logoHeaderStore');
    //     Route::post('/navbar-header', [LayoutController::class, 'navbarHeaderStore'])->name('navbarHeaderStore');
    //     Route::post('/sidebar', [LayoutController::class, 'sidebarStore'])->name('sidebarStore');
    //     Route::post('/background', [LayoutController::class, 'backgroundStore'])->name('backgroundStore');
    // });


    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('myProfile.profile.index');
        Route::post('/update', [ProfileController::class, 'update'])->name('myProfile.profile.update');
    });
});


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::get('/visitor-info', [VisitorInfoController::class, 'index'])->name('visitorInfo.index');
Route::get('/visitor-info/delete-selected', [VisitorInfoController::class, 'destroySelected'])->name('visitorInfo.destroySelected');
Route::get('/visitor-info/delete-all', [VisitorInfoController::class, 'destroyAll'])->name('visitorInfo.destroyAll');


// Route::post('visitor/delete/selected', 'VisitorInfoController@delSelected')->name('visitor.delSelected');

// !APP BACKUP
Route::get('web-backup/password', [BackupController::class, 'password'])->name('backup.password');
Route::post('web-backup/checkPassword', [BackupController::class, 'checkPassword'])->name('backup.checkPassword');
Route::get('web-backup/confirm', [BackupController::class, 'index'])->name('backup.index');

Route::post('backup-file', [BackupController::class, 'backupFiles'])->name('backup.files');
Route::post('backup-db', [BackupController::class, 'backupDb'])->name('backup.db');

// Route::get('web-backup/restore', [BackupController::class, 'restoreLoad'])->name('backup.restore');
// Route::post('web-backup/restore/post', [BackupController::class, 'restore'])->name('backup.restore.post');

Route::post('/backup-download/{name}/{ext}', [BackupController::class, 'downloadBackup'])->name('backup.download');
Route::post('/backup-delete/{name}/{ext}', [BackupController::class, 'deleteBackup'])->name('backup.delete');

// Route::post('web-backup/setpass', 'WebBackupController@setPass')->name('backup.setPass');
// Route::get('web-backup/', 'WebBackupController@index')->name('backup.index');

Route::post('role/permission/{role}', [RoleController::class, 'assignPermission'])->name('role.permission');
Route::resource('role', RoleController::class);
Route::resource('permission', PermissionController::class);

Route::prefix('admin-user')->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('adminUser.index');
    Route::get('/create', [AdminUserController::class, 'create'])->name('adminUser.create');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('adminUser.edit');
    Route::post('/store', [AdminUserController::class, 'store'])->name('adminUser.store');
});

Route::resource('/slider', SliderController::class);

Route::resource('/courser-categories', CourseCatController::class)->except(['show']);

Route::resource('/course', CourseController::class);
Route::resource('/certificate-signature', CerSignatureController::class);
Route::resource('/chapter', ChapterController::class)->only(['store']);
Route::resource('/lecture', LectureController::class);
Route::get('/get-chapter', [LectureController::class, 'chapter'])->name('get.chapter');
Route::get('/lecture-play/{course_id}/{lecture_id}', [LectureController::class, 'lecturePlay'])->name('lecture.lecturePlay');
Route::post('/lectureComplete', [LectureController::class, 'lectureComplete'])->name('lecture.lectureComplete');

Route::controller(QuizController::class)->prefix('quiz')->group(function () {
    Route::get('/course', 'course')->name('quiz.course');
    Route::get('/quiz/{course_id}', 'addQuiz')->name('quiz.quiz');
    Route::post('/question/store', 'quesStore')->name('quiz.quesStore');
    Route::post('/question/update/{quesId}', 'quesUpdate')->name('quiz.quesUpdate');
    Route::delete('/question/destroy/{quesId}', 'quesDestroy')->name('quiz.quesDestroy');
    Route::post('/option/store', 'optionStore')->name('quiz.optionStore');
    Route::post('/option/update/{optionId}/{quizId}', 'optionUpdate')->name('quiz.optionUpdate');
    Route::delete('/option/destroy/{optionId}', 'optionDestroy')->name('quiz.optionDestroy');
});
Route::controller(StudentHistoryController::class)->prefix('student-history')->group(function () {
    Route::get('/', 'index')->name('studentHistory.index');
});
