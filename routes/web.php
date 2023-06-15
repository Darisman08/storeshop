<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AreaAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('staff')->group(function () {
    // Route Product
    Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
    Route::get('/product-create', [ProductController::class, 'create'])->middleware('auth');
    Route::post('/product-store', [ProductController::class, 'store'])->middleware('auth');
    Route::get('/product-edit-{id}', [ProductController::class, 'edit'])->middleware('auth');
    Route::put('/product-update', [ProductController::class, 'update'])->middleware('auth');
    // Route Slide
    Route::get('/slide', [SlideController::class, 'index'])->middleware('auth');
    Route::get('/slide-create', [SlideController::class, 'create'])->middleware('auth');
    Route::post('/slide-store', [SlideController::class, 'store'])->middleware('auth');
    Route::get('/slide-edit-{id}', [SlideController::class, 'edit'])->middleware('auth');
    Route::put('/slide-update', [SlideController::class, 'update'])->middleware('auth');
    // Route Dashboard
    Route::get('/dash', [AreaAdminController::class, 'index']);
});

Route::middleware('admin')->group(function () {
    // Route Approval
    Route::get('/approve-pro', [ApprovalController::class, 'index_pro']);
    Route::get('/approve-sli', [ApprovalController::class, 'index_sli']);
    Route::get('/approve-pro-edit-{id}', [ApprovalController::class, 'edit_pro']);
    Route::put('/approve-pro-update', [ApprovalController::class, 'update_pro']);
    Route::get('/approve-sli-edit-{id}', [ApprovalController::class, 'edit_sli']);
    Route::put('/approve-sli-update', [ApprovalController::class, 'update_sli']);
    // Route User
    Route::get('/user', [UserController::class, 'index'])->middleware('auth');
    Route::get('/user-create', [UserController::class, 'create'])->middleware('auth');
    Route::post('/user-store', [UserController::class, 'store'])->middleware('auth');
    Route::get('/user-edit-{id}', [UserController::class, 'edit'])->middleware('auth');
    Route::put('/user-update', [UserController::class, 'update'])->middleware('auth');
    Route::get('/user-del-{id}', [UserController::class, 'destroy'])->middleware('auth');
    // Route Role
    Route::get('/role', [RoleController::class, 'index'])->middleware('auth');
    Route::get('/role-create', [RoleController::class, 'create'])->middleware('auth');
    Route::post('/role-store', [RoleController::class, 'store'])->middleware('auth');
    Route::get('/role-edit-{id}', [RoleController::class, 'edit'])->middleware('auth');
    Route::put('/role-update', [RoleController::class, 'update'])->middleware('auth');
    Route::get('/role-del-{id}', [RoleController::class, 'destroy'])->middleware('auth');
    // Route Category
    Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');
    Route::get('/category-create', [CategoryController::class, 'create'])->middleware('auth');
    Route::post('/category-store', [CategoryController::class, 'store'])->middleware('auth');
    Route::get('/category-edit-{id}', [CategoryController::class, 'edit'])->middleware('auth');
    Route::put('/category-update', [CategoryController::class, 'update'])->middleware('auth');
    Route::get('/category-del-{id}', [CategoryController::class, 'destroy'])->middleware('auth');
    // Route Delete
    Route::get('/product-del-{id}', [ProductController::class, 'destroy'])->middleware('auth');
    Route::get('/slide-del-{id}', [SlideController::class, 'destroy'])->middleware('auth');
});
