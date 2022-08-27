<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendaGuruController;


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


Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cek_login:admin']], function(){
        Route::get('admin','App\Http\Controllers\AdminController@index')->name('admin');
    });

    Route::group(['middleware' => ['cek_login:agendaguru']], function(){
        Route::get('agendaguru','App\Http\Controllers\AgendaGuruController@index')->name('agendaguru');
    });
});

Route::get('/', function () {
    return view('welcome');
});

// Guru
Route::get('/guru',[GuruController::class, 'index'])->name('guru');

Route::get('/tambahguru',[GuruController::class, 'tambahguru'])->name('tambahguru');
Route::post('/insertguru',[GuruController::class, 'insertguru'])->name('insertguru');

Route::get('/edit-guru/{id}',[GuruController::class, 'edit'])->name('tampilkanguru');
Route::post('/update-guru/{id}',[GuruController::class, 'update'])->name('updateguru');

Route::get('/delete-guru/{id}',[GuruController::class, 'delete'])->name('deleteguru');
// End Guru

// Kelas
Route::get('/kelas',[KelasController::class, 'index'])->name('kelas');

Route::get('/tambahkelas',[KelasController::class, 'tambahkelas'])->name('tambahkelas');
Route::post('/insertkelas',[KelasController::class, 'insertkelas'])->name('insertkelas');

Route::get('/edit-kelas/{id}',[KelasController::class, 'edit'])->name('tampilkankelas');
Route::post('/update-kelas/{id}',[KelasController::class, 'update'])->name('updatekelas');

Route::get('/delete-kelas/{id}',[KelasController::class, 'delete'])->name('deletekelas');
// End Kelas

// agenda
Route::get('/agenda',[AgendaController::class, 'index'])->name('agenda');

Route::get('/tambahagenda',[AgendaController::class, 'tambahagenda'])->name('tambahagenda');
Route::post('/insertagenda',[AgendaController::class, 'insertagenda'])->name('insertagenda');

Route::get('/edit-agenda/{id}',[AgendaController::class, 'edit'])->name('tampilkanagenda');
Route::post('/update-agenda/{id}',[AgendaController::class, 'update'])->name('updateagenda');

Route::get('/delete-agenda/{id}',[AgendaController::class, 'delete'])->name('deleteagenda');
// End agenda

// agenda guru
Route::get('/agendaguru',[AgendaGuruController::class, 'index'])->name('agendaguru');

Route::get('/tambahagendaguru',[AgendaGuruController::class, 'tambahagendaguru'])->name('tambahagendaguru');
Route::post('/insertagendaguru',[AgendaGuruController::class, 'insertagendaguru'])->name('insertagendaguru');

// end agenda guru