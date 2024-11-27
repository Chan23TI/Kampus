<?php

use App\Models\PesanSaran;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Artikel92Controller;
use App\Http\Controllers\PesanSaranController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\QuestionAnswerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beritum', function () {
    return view('berita');
});

Route::get('/rajaongkir', function () {
    return view('raja-ongkir');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');//->middleware('role:admin,super_admin');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');//->middleware('role:admin,super_admin');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');//->middleware('role:admin,super_admin');
});

Route::resource('questionAnswer', QuestionAnswerController::class);//->middleware('role:super_admin');
Route::resource('pesan_saran', PesanSaranController::class);//->middleware('role:admin,super_admin');
Route::resource('berita', BeritaController::class);//->middleware('role:admin');
Route::resource('artikel92', Artikel92Controller::class);//->middleware('role:admin,super_admin');

Route::get('/landing',[HomeController::class, 'index'])->name('home');
Route::get('/test',[HomeController::class, 'test'])->name('home');

Route::get('/rajaongkir/province', [RajaOngkirController::class, 'getProvinces']);
Route::get('/rajaongkir/city', [RajaOngkirController::class, 'getCities']);
Route::post('/rajaongkir/cost', [RajaOngkirController::class, 'getCost']);





require __DIR__.'/auth.php';

