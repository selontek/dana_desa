<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanaDesaController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\BencanaController;



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

Route::get('/', function () {
    return view('welcome');
});


// ROUTE USER
Route::middleware(['auth','level:user'])->group(function(){
    Route::get('/user', function () {
        return view('dashboard');
    })->middleware('auth');
});

// ROUTE ADMIN
Route::middleware(['auth', 'level:Administrator'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('/admin/dana', [DanaDesaController::class, 'index']);
    Route::get('/admin/tambah', [DanaDesaController::class, 'create']);
    Route::post('/admin/store', [DanaDesaController::class, 'store']);
    Route::patch('/profile', [DanaDesaController::class, 'update']);
    Route::delete('/profile', [DanaDesaController::class, 'destroy']);


    Route::get('/pembangunan', [PembangunanController::class, 'index']);
    Route::get('/pembangunan/tambah', [PembangunanController::class, 'create']);
    Route::post('/pembangunan/store', [PembangunanController::class, 'store']);
    Route::patch('/profile', [PembangunanController::class, 'update']);
    Route::delete('/profile', [PembangunanController::class, 'destroy']);


    Route::get('/olahraga', [OlahragaController::class, 'index']);
    Route::get('/olahraga/tambah', [OlahragaController::class, 'create']);
    Route::post('/olahraga/store', [OlahragaController::class, 'store']);
    Route::patch('/profile', [OlahragaController::class, 'update']);
    Route::delete('/profile', [OlahragaController::class, 'destroy']);


    Route::get('/admin/bencana', [BencanaController::class, 'index']);
    Route::get('/admin/tambah', [OlahragaController::class, 'create']);
    Route::post('/admin/store', [OlahragaController::class, 'store']);
    Route::patch('/profile', [OlahragaController::class, 'update']);
    Route::delete('/profile', [OlahragaController::class, 'destroy']);
});



Route::middleware('auth')->group(function () {
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
