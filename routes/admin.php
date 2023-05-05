<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::namespace('Admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
        Route::get('/courses', [\App\Http\Controllers\Admin\AdminController::class, 'courseView'])->name('admin.course-view');
        Route::get('/courses-index', [\App\Http\Controllers\Admin\AdminController::class, 'getCourse'])->name('admin.course-index');
        Route::get('/courses-create', [\App\Http\Controllers\Admin\AdminController::class, 'courseStoreView'])->name('admin.course-create');
        Route::post('/courses-save', [\App\Http\Controllers\Admin\AdminController::class, 'courseStore'])->name('admin.course-save');
        Route::get('/lessons/index', [\App\Http\Controllers\Admin\LessonController::class, 'index'])->name('lessons.index');
        Route::get('/lessons/create', [\App\Http\Controllers\Admin\LessonController::class, 'create'])->name('lessons.create');
        Route::post('lessons/store', [\App\Http\Controllers\Admin\LessonController::class, 'store'])->name('lessons.store');
        Route::post('lessons/import', [\App\Http\Controllers\Admin\LessonController::class, 'import'])->name('lessons.import');
        Route::get('lessons/import', [\App\Http\Controllers\Admin\LessonController::class, 'importView'])->name('lessons.importView');
        Route::get('students', [\App\Http\Controllers\Admin\StudentController::class, 'index'])->name('students.index');
        Route::get('students/create', [\App\Http\Controllers\Admin\StudentController::class, 'create'])->name('students.create');
        Route::post('students/store', [\App\Http\Controllers\Admin\StudentController::class, 'store'])->name('students.store');
    });
});
