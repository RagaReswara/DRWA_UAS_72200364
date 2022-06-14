<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//GURU
Route::get('/guru/list',[App\Http\Controllers\GuruController::class, 'list']);
Route::post('/guru/addGuru',[App\Http\Controllers\GuruController::class, 'addGuru']);


//KELAS
Route::get('/kelas/list',[App\Http\Controllers\KelasController::class, 'list']);
Route::post('/kelas/addKelas',[App\Http\Controllers\KelasController::class, 'addKelas']);

Route::put('/kelas/update/{id}',[App\Http\Controllers\KelasController::class, 'update']);
Route::delete('/kelas/delete/{id}',[App\Http\Controllers\KelasController::class, 'delete']);

//MAPEL
Route::get('/mapel/list',[App\Http\Controllers\MapelController::class, 'list']);
Route::post('/mapel/addMapel',[App\Http\Controllers\MapelController::class, 'addMapel']);

//JADWAL GURU
Route::get('/jg/list',[App\Http\Controllers\JadwalGuruController::class, 'list']);
Route::post('/jg/addJadwalGuru',[App\Http\Controllers\JadwalGuruController::class, 'addJadwalGuru']);

//PRESENSI HARIAN
Route::get('/ph/list',[App\Http\Controllers\PresHarController::class, 'list']);
Route::post('/ph/addPresensi',[App\Http\Controllers\PresHarController::class, 'addPresensi']);