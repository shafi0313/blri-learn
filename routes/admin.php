<?php

use App\Models\User;
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
use App\Http\Controllers\Admin\MyProfile\LayoutController;
use App\Http\Controllers\Admin\MyProfile\ProfileController;
use App\Http\Controllers\Auth\Permission\PermissionController;



Route::get('/t', function () {
    return User::with('permissionn')->get();

});

Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register-store', [AuthController::class, 'registerStore'])->name('registerStore');
Route::post('/enrollRegisterStore', [AuthController::class, 'enrollRegisterStore'])->name('enrollRegisterStore');
Route::get('/register-verify/{token}', [AuthController::class, 'registerVerify'])->name('registerVerify');
Route::get('/verify-notification', [AuthController::class, 'verifyNotification'])->name('verifyNotification');

Route::post('/verify-resend', [AuthController::class, 'verifyResend'])->name('verifyResend');

Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password-process', [AuthController::class, 'forgetPasswordProcess'])->name('forgetPasswordProcess');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/reset-password-process', [AuthController::class, 'resetPasswordProcess'])->name('resetPasswordProcess');
Route::get('/reset-verify-notification', [AuthController::class, 'resetVerifyNotification'])->name('resetVerifyNotification');

Route::post('/enrol-login-process', [AuthController::class, 'enrollLoginProcess'])->name('enrollLoginProcess');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('my-profile')->group(function(){
    Route::prefix('layout')->group(function(){
        Route::get('/', [LayoutController::class, 'create'])->name('admin.layout.create');
        Route::post('/dark', [LayoutController::class, 'layoutDark'])->name('layout.layoutDark');
        Route::post('/light', [LayoutController::class, 'layoutLight'])->name('layout.layoutLight');
        Route::post('/submit-button', [LayoutController::class, 'submitBtn'])->name('layout.submitBtn');
        Route::post('/add-button', [LayoutController::class, 'createBtn'])->name('layout.createBtn');
        Route::post('/table', [LayoutController::class, 'table'])->name('layout.table');
        Route::post('/table-bg', [LayoutController::class, 'tableBg'])->name('layout.tableBg');
        Route::post('/table-text', [LayoutController::class, 'tableText'])->name('layout.tableText');
        Route::post('/logo-header', [LayoutController::class, 'logoHeaderStore'])->name('admin.logoHeaderStore');
        Route::post('/navbar-header', [LayoutController::class, 'navbarHeaderStore'])->name('admin.navbarHeaderStore');
        Route::post('/sidebar', [LayoutController::class, 'sidebarStore'])->name('admin.sidebarStore');
        Route::post('/background', [LayoutController::class, 'backgroundStore'])->name('admin.backgroundStore');
    });


    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'index'])->name('admin.myProfile.profile.index');
        Route::post('/update', [ProfileController::class, 'update'])->name('admin.myProfile.profile.update');
    });
});

Route::middleware(['auth','admin','permission:access-dashboard'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


    Route::get('/visitor-info', [VisitorInfoController::class, 'index'])->name('admin.visitorInfo.index');
    Route::get('/visitor-info/delete-selected', [VisitorInfoController::class, 'destroySelected'])->name('admin.visitorInfo.destroySelected');
    Route::get('/visitor-info/delete-all', [VisitorInfoController::class, 'destroyAll'])->name('admin.visitorInfo.destroyAll');


    // Route::post('visitor/delete/selected', 'VisitorInfoController@delSelected')->name('visitor.delSelected');

    // !APP BACKUP
    Route::get('web-backup/password', [BackupController::class, 'password'])->name('admin.backup.password');
    Route::post('web-backup/checkPassword', [BackupController::class, 'checkPassword'])->name('admin.backup.checkPassword');
    Route::get('web-backup/confirm', [BackupController::class, 'index'])->name('admin.backup.index');

    Route::post('backup-file', [BackupController::class, 'backupFiles'])->name('admin.backup.files');
    Route::post('backup-db', [BackupController::class, 'backupDb'])->name('admin.backup.db');

    // Route::get('web-backup/restore', [BackupController::class, 'restoreLoad'])->name('admin.backup.restore');
    // Route::post('web-backup/restore/post', [BackupController::class, 'restore'])->name('admin.backup.restore.post');

    Route::post('/backup-download/{name}/{ext}', [BackupController::class, 'downloadBackup'])->name('admin.backup.download');
    Route::post('/backup-delete/{name}/{ext}', [BackupController::class, 'deleteBackup'])->name('admin.backup.delete');

    // Route::post('web-backup/setpass', 'WebBackupController@setPass')->name('backup.setPass');
    // Route::get('web-backup/', 'WebBackupController@index')->name('backup.index');

    Route::post('role/permission/{role}', [RoleController::class, 'assignPermission'])->name('role.permission');
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);


    Route::prefix('admin-user')->group(function(){
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.adminUser.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.adminUser.create');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.adminUser.edit');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.adminUser.store');
    });


    Route::resource('/slider', SliderController::class, [
        'names'=>[
            'index'=> 'admin.slider.index',
            'create'=> 'admin.slider.create',
            'store'=> 'admin.slider.store',
            'edit'=> 'admin.slider.edit',
            'update'=> 'admin.slider.update',
            'destroy'=> 'admin.slider.destroy',
        ]
    ]);

    Route::resource('/courser-cat', CourseCatController::class, [
        'names'=>[
            'index'=> 'admin.courseCat.index',
            'create'=> 'admin.courseCat.create',
            'store'=> 'admin.courseCat.store',
            'edit'=> 'admin.courseCat.edit',
            'update'=> 'admin.courseCat.update',
            'destroy'=> 'admin.courseCat.destroy',
        ]
    ]);

    Route::resource('/course', CourseController::class);
    Route::resource('/chapter', ChapterController::class)->only(['store']);
    Route::resource('/lecture', LectureController::class);
    Route::get('/get-chapter', [LectureController::class, 'chapter'])->name('get.chapter');
    Route::get('/lecture-play/{course_id}/{lecture_id}', [LectureController::class, 'lecturePlay'])->name('admin.lecture.lecturePlay');
    Route::post('/lectureComplete', [LectureController::class, 'lectureComplete'])->name('admin.lecture.lectureComplete');

    Route::controller(QuizController::class)->prefix('quiz')->group(function () {
        Route::get('/course', 'course')->name('admin.quiz.course');
        Route::get('/quiz/{course_id}', 'addQuiz')->name('admin.quiz.quiz');
        Route::post('/question/store', 'quesStore')->name('admin.quiz.quesStore');
        Route::post('/question/update/{quesId}', 'quesUpdate')->name('admin.quiz.quesUpdate');
        Route::post('/option/store', 'optionStore')->name('admin.quiz.optionStore');
        Route::post('/option/update/{optionId}/{quizId}', 'optionUpdate')->name('admin.quiz.optionUpdate');
    });
});
