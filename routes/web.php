<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function Symfony\Component\String\u;

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [AboutController::class, 'About'])->name('about');
Route::get('/course', [CourseUserController::class, 'Course'])->name('course');
Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])->name('contact.post');

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});
    
Route::middleware('auth')->group(function() {
    Route::resource('profiles', ProfileController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/lesson/{course}', [LessonController::class, 'Lesson'])->name('lesson');
    Route::get('/lesson/{course}/quiz', [QuizController::class, 'quizShow'])->name('quiz');
    Route::get('/lesson/{course}/quiz/preview', [QuizController::class, 'quizPreview'])->name('quiz-preview');
    Route::get('/lesson/{course}/quiz/score', [QuizController::class, 'score'])->name('score');
    Route::post('/lesson/{course}/quiz', [QuizController::class, 'quiz'])->name('quiz.post');

    });
    
    Route::middleware('is-admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/admin/category', [CategoryController::class, 'showCategory'])->name('category');
    Route::post('/admin/category', [CategoryController::class, 'Category'])->name('category.post');
    Route::resource('users', InfoUserController::class);
    Route::resource('courses', CourseController::class);

});
