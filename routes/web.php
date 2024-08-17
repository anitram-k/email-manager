<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

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
Route::get('/emails', [EmailController::class, 'index'])->name('emails.index');
Route::get('/emails/create', [EmailController::class, 'create'])->name('emails.create');
Route::post('/emails', [EmailController::class, 'store'])->name('emails.store');
Route::delete('/emails/{id}', [EmailController::class, 'destroy'])->name('emails.destroy');