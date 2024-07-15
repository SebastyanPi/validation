<?php

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listStudent/{id}', [App\Http\Controllers\HomeController::class, 'listStudent'])->name('listStudent');
Route::post('/addCertification', [App\Http\Controllers\HomeController::class, 'addCertification'])->name('addCertification');
Route::get('/certificate', [App\Http\Controllers\CertificateController::class, 'searchCertificate'])->name('certificate');
Route::get('/generate/certificate', [App\Http\Controllers\CertificateController::class, 'generateCertificate'])->name('generate.certificate');