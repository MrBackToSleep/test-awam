<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviseController;
use App\Http\Controllers\HistoryController;
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

Route::get('/', [DeviseController::class, 'index'])->name('accueil');
Route::post('/calcul', [DeviseController::class, 'calcul'])->name('devises_calcul');
Route::get('/sendMail', [HistoryController::class, 'sendMailRecapitulatif'])->name('send_mail_recapitulatif');
