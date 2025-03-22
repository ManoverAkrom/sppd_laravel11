<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KategoriBiayaController;
use App\Http\Controllers\KomponenBiayaController;



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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware(IsAdmin::class);

Route::resource('/dashboard/users', AdminUserController::class)->middleware('auth');

Route::get('dashboard/reset/{user}', [UserController::class, 'edit'])->name('dashboard.reset.edit')->middleware('auth');
Route::post('dashboard/reset/{user}', [UserController::class, 'update'])->name('dashboard.reset.update')->middleware('auth');

Route::get('/dashboard/posts/{slug}/pdf', [PDFController::class, 'generatePDF'])->middleware('auth');
Route::get('/dashboard/pdf/{post:slug}', [PDFController::class, 'summaryPDF'])->middleware('auth');

// Rute Master
Route::resource('/dashboard/master', MasterController::class)->middleware('auth');
Route::post('dashboard/master/{id}/approve', [MasterController::class, 'approve']);
// Route::get('/dashboard/master/accept/{post:slug}', [MasterController::class, 'accept'])->middleware('auth');
Route::get('/dashboard/master/reject/{post:slug}', [MasterController::class, 'reject'])->middleware('auth');

Route::resource('/dashboard/institutes', InstituteController::class)->middleware('auth');

// Rute Bendahara
Route::resource('/dashboard/kategori_biaya', KategoriBiayaController::class)->middleware('auth');
Route::resource('/dashboard/komponen_biaya', KomponenBiayaController::class)->middleware('auth');
Route::resource('/dashboard/outcomes', OutcomeController::class)->middleware('auth');
// Route::get('/dashboard/outcomes/create/{sppd_id}', [OutcomeController::class, 'create'])->name('outcomes.create');
