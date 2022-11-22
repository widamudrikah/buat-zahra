<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\Admin\KursusController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\PesertaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Akses Admin 1

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/welcome','index')->name('welcome');  
    });
    
    Route::controller(KategoriController::class)->group(function(){
        Route::get('/kategori','index')->name('kategori');
        Route::post('/kategori/store', 'store')->name('kategori.store');  
    });
    
    Route::controller(KursusController::class)->group(function(){
        Route::get('/kursus', 'index')->name('kursus');
        Route::get('/kursus/create', 'create')->name('kursus.create');
        Route::post('/kursus/store', 'store')->name('kursus.store');
    });
});
//End Akses Admin


//Akses Mentor 2
Route::prefix('mentor')->middleware(['auth', 'isMentor', 'blokir'])->group(function(){
    Route::controller(MentorController::class)->group(function(){
        Route::get('/welcome','index')->name('welcome.mentor');  
    });
});
 //End Akses Mentor


//Akses Peserta 3
Route::prefix('peserta')->middleware(['auth', 'isPeserta'])->group(function(){
    Route::controller(PesertaController::class)->group(function(){
        Route::get('/welcome','index')->name('welcome.peserta');  
    });
});
//End Akses Peserta






