<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanaDesaController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\BencanaController;
use App\Http\Controllers\UserController;



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
        return view('user.index');
    });

    Route::get('/user/dashboard', [UserController::class, 'index']);
    Route::get('/user/danadesa', [UserController::class, 'danadesa']);
    Route::get('/user/pembangunan', [UserController::class, 'pembangunan']);
    Route::get('/user/olahraga', [UserController::class, 'olahraga']);
    Route::get('/user/bencana', [UserController::class, 'bencana']);
    
});


// ROUTE ADMIN
Route::middleware(['auth', 'level:Administrator'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::get('/admin/dana', [DanaDesaController::class, 'index']);
    Route::get('/admin/tambah', [DanaDesaController::class, 'create']);
    Route::post('/admin/store', [DanaDesaController::class, 'store']);
    Route::get('/admin/edit/{id}', [DanaDesaController::class, 'edit']);
    Route::put('/admin/{id}', [DanaDesaController::class, 'update']);
    Route::delete('/profile', [DanaDesaController::class, 'destroy']);


    Route::get('/pembangunan', [PembangunanController::class, 'index']);
    Route::get('/pembangunan/tambah', [PembangunanController::class, 'create']);
    Route::post('/pembangunan/store', [PembangunanController::class, 'store']);
    Route::get('/pembangunan/editp/{id}', [PembangunanController::class, 'edit']);
    Route::put('/pembangunan/{id}', [PembangunanController::class, 'update']);
    Route::delete('/pembangunan/{id}', [PembangunanController::class, 'destroy']);


    Route::get('/olahraga', [OlahragaController::class, 'index']);
    Route::get('/olahraga/tambah', [OlahragaController::class, 'create']);
    Route::post('/olahraga/store', [OlahragaController::class, 'store']);
    Route::get('/olahraga/edito/{id}', [OlahragaController::class, 'edit']);
    Route::put('/olahraga/{id}', [OlahragaController::class, 'update']);
    Route::delete('/olahraga/{id}', [OlahragaController::class, 'destroy']);


    Route::get('/bencana', [BencanaController::class, 'index']);
    Route::get('/bencana/tambah', [BencanaController::class, 'create']);
    Route::post('/bencana/store', [BencanaController::class, 'store']);
    Route::get('/bencana/editb/{id}', [BencanaController::class, 'edit']);
    Route::patch('/bencana/{id}', [BencanaController::class, 'update']);
    Route::delete('/bencana/{id}', [BencanaController::class, 'destroy']);
});



Route::middleware('auth')->group(function () {
    
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
