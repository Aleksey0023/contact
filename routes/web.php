<?php

use App\Http\Controllers\Contact\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'showForm'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});
