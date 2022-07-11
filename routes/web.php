<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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




//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('migrate', function () {
	Artisan::call('migrate');
});

Route::get('seed', function () {
    Artisan::call('db:seed');
});

Route::get('config-clear', function () {
	Artisan::call('config:clear');
});

Route::get('cache-clear', function () {
	Artisan::call('cache:clear');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        $patients = \App\Models\Patient::all();
        return view('dashboard', [
            'patients' => $patients
        ]);
    });

    Route::get('generate-letter/{id}', [\App\Http\Controllers\HomeController::class, 'generateLetter']);

    Route::get('generated-letter/{id}', [\App\Http\Controllers\HomeController::class, 'letter']);

    Route::post('save-letter', [\App\Http\Controllers\HomeController::class, 'saveLetter']);
});




