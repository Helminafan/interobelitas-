<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BarangController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get(
    '/admin/logout',
    [
        AdminController::class, 'logout'
    ]
)->name('admin.logout');

Route::get('/profil', function () {
    return view('admin2.home');
});


//sebuah route untuk grup
Route::prefix('users')->group(function () {
    Route::get(
        '/view',
        [
            UserController::class, 'UserView'
        ]
    )->name('user.view');

    Route::get(
        '/add',
        [
            UserController::class, 'UserAdd'
        ]
    )->name('user.add');

    Route::post(
        '/store',
        [
            UserController::class, 'UserStore'
        ]
    )->name('users.store');

    Route::get(
        '/edit/{id}',
        [
            UserController::class, 'UserEdit'
        ]
    )->name('users.edit');

    Route::post(
        '/update/{id}',
        [
            UserController::class, 'UserUpdate'
        ]
    )->name('users.update');

    Route::get(
        '/delete/{id}',
        [
            UserController::class, 'UserDelete'
        ]
    )->name('users.delete');
});

Route::prefix('barang')->group(function () {
    Route::get(
        '/view',
        [
            BarangController::class, 'barangView'
        ]
    )->name('barang.view');

    
});
