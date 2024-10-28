<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -------------------------------------------------------------------------
// Code Worshiper - Website Kursus - Register sengan SMTP
// -------------------------------------------------------------------------

// Route::middleware(['guest'])->group(function () {
//     Route::get('auth', [AuthController::class, 'auth'])->name('auth');
//     Route::post('register', [AuthController::class, 'register'])->name('register');
//     Route::post('login', [AuthController::class, 'login'])->name('login');
// });

// Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('role:admin');
// Route::get('user', [UserController::class, 'index'])->name('user')->middleware('role:user');

// Route::middleware(['auth'])->group(function() {
//     Route::get('spt', [UserController::class, 'spt'])->name('spt');

//     // User Fitur
//     Route::post('create', [UserController::class, 'create'])->name('create');

//     Route::get('surat', [UserController::class, 'surat'])->name('surat');
//     Route::get('laporan', [UserController::class, 'laporan'])->name('laporan');

//     Route::get('generate-laporan', [UserController::class, 'generate-laporanPdf'])->name('generate-laporanPdf');

//     // Admin Fitur

// });

// Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('verify/{id}/{hash}', [AuthController::class, 'verify'])->name('verification.verify');



// -------------------------------------------------------------------------
// WPU-Blog
// -------------------------------------------------------------------------
Route::get('/', function () {
    return view('home', [
        'title' => 'Home Page'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'posts' => Post::all()
    ]);
})->middleware('auth');

Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware(IsAdmin::class);

Route::resource('/dashboard/users', AdminUserController::class)->middleware(IsAdmin::class);