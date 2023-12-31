<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BothControlller;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'welcome'])->middleware('startpoint')->name('welcome');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
    // Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
    Route::post('/email', [LandingController::class, 'store'])->name('landing.store');
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

        //users
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/adduser', [AdminController::class, 'adduser'])->name('admin.adduser');
        Route::post('/admin/adduserform', [AdminController::class, 'adduserform'])->name('admin.adduserform');
        Route::post('/admin/deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');
        Route::get('/admin/file/{id}', [AdminController::class, 'file'])->name('admin.file');

        //projects
        Route::get('/admin/projects', [AdminController::class, 'projects'])->name('admin.projects');
        Route::get('/admin/addproject', [AdminController::class, 'addproject'])->name('admin.addproject');
        Route::post('/admin/addprojectform', [AdminController::class, 'addprojectform'])->name('admin.addprojectform');
        Route::post('/admin/deleteproject/{id}', [AdminController::class, 'deleteproject'])->name('admin.deleteproject');
        Route::get('/admin/message', [AdminController::class, 'message'])->name('admin.message');
        Route::post('/admin/sendmessageform', [AdminController::class, 'sendmessageform'])->name('admin.sendmessageform');
    });

    Route::middleware(['user'])->group(function () {
        Route::post('/admin/deleteproject/{id}', [AdminController::class, 'deleteproject'])->name('admin.deleteproject');
        Route::get('/client/home', [ClientController::class, 'home'])->name('client.home');
        Route::get('/client/myprojects', [ClientController::class, 'myprojects'])->name('client.myprojects');
        Route::get('/client/message', [ClientController::class, 'message'])->name('client.message');
        Route::post('/client/sendmessageform', [ClientController::class, 'sendmessageform'])->name('client.sendmessageform');
        Route::post('/client/changestate/{id}', [ClientController::class, 'changestate'])->name('client.changestate');
    });

    //Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});