<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [AboutController::class, 'About'])->name('about');
Route::get('/contact', [ContactController::class, 'Contact'])->name('contact');
Route::get('/course', [CourseController::class, 'Course'])->name('course');
Route::get('/lesson', [LessonController::class, 'Lesson'])->name('lesson');
Route::get('/lesson/quiz', [QuizController::class, 'Quiz'])->name('quiz');
Route::get('/admin/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
Route::get('/admin/user', [AdminUserController::class, 'User'])->name('user');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
