<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('frontend.about');
Route::get('/category', [App\Http\Controllers\FrontendController::class, 'category'])->name('frontend.category');
Route::get('/course', [App\Http\Controllers\FrontendController::class, 'course'])->name('frontend.course');
Route::get('/course/{id}', [App\Http\Controllers\FrontendController::class, 'courseId'])->name('frontend.courseId');
Route::get('/course/teacher/{id}', [App\Http\Controllers\FrontendController::class, 'courseTeacherId'])->name('frontend.courseTeacherId');
Route::get('/teacher', [App\Http\Controllers\FrontendController::class, 'teacher'])->name('frontend.teacher');
Route::get('/prestasi/{id}', [App\Http\Controllers\FrontendController::class, 'prestasi'])->name('frontend.prestasi');
Route::get('/teacher/{id}', [App\Http\Controllers\FrontendController::class, 'teacherId'])->name('frontend.teacherId');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('frontend.contact');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/pesan/{id}', [App\Http\Controllers\FrontendController::class, 'pesan'])->name('frontend.pesan');
    Route::post('/pesan', [App\Http\Controllers\FrontendController::class, 'pesanpost'])->name('frontend.pesan.post');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::post('upload', [App\Http\Controllers\ProfileController::class, 'upload'])->name('profile.upload');
    Route::post('password', [App\Http\Controllers\ProfileController::class, 'password'])->name('password');

    Route::middleware(['admin'])->group(function () {
        Route::resource('admin-dashboard', App\Http\Controllers\Admin\DashboardController::class);
        Route::resource('admin-category', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('admin-order', App\Http\Controllers\Admin\OrderClassController::class);
        Route::resource('admin-teacher', App\Http\Controllers\Admin\TeacherController::class);
        Route::resource('admin-student', App\Http\Controllers\Admin\StudentController::class);
        Route::resource('admin-website', App\Http\Controllers\Admin\WebsiteController::class);
    });
    
    Route::middleware(['status'])->group(function () {

        Route::middleware(['teacher'])->group(function () {
            Route::resource('teacher-dashboard', App\Http\Controllers\Teacher\TeacherDashboardController::class);
            Route::resource('teacher-student', App\Http\Controllers\Teacher\StudentController::class);
            Route::resource('teacher-category', App\Http\Controllers\Teacher\CategoryController::class);
            Route::resource('teacher-course', App\Http\Controllers\Teacher\CourseController::class);
            Route::resource('teacher-class', App\Http\Controllers\Teacher\MateriController::class);
            Route::resource('teacher-order', App\Http\Controllers\Teacher\OrderClassController::class);
            Route::resource('teacher-riwayat', App\Http\Controllers\Teacher\RiwayatController::class);
            Route::resource('teacher-perestasi', App\Http\Controllers\Teacher\PerestasiController::class);
        });
        
        Route::middleware(['student'])->group(function () {
            Route::resource('student-dashboard', App\Http\Controllers\Student\StudentDashboardController::class);
            Route::resource('student-order', App\Http\Controllers\Student\OrderClass::class);
            Route::resource('student-class', App\Http\Controllers\Student\MateriController::class);
        });

        Route::get('/logout', function(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            redirect()->route('frontend.index');
        });
    });
});