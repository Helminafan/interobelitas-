<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BarangController;
use App\Http\Controllers\DosenController;

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


Route::prefix('dosen')->group(function () {
    Route::get('/dosen', [DosenController::class, 'view_dosen'])->name('dosen.view');
    // Route::get('/tambahpenduduk', [AdminController::class, 'tambahPenduduk'])->name('tambahPenduduk.view');
    // Route::get('/deletependuduk/{id}', [AdminController::class, 'deletePenduduk'])->name('penduduk.delete');
    Route::get('/editdosen/{nip}', [DosenController::class, 'edit_dosen'])->name('dosen.edit');
    Route::post('/updatedosen/{nip}', [DosenController::class, 'update_dosen'])->name('dosen.update');
    // Route::post('/pendudukBaru', [AdminController::class, 'pendudukBaru'])->name('pendudukBaru');
});