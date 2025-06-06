<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReciclajeController;
use App\Http\Controllers\RecompensasController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactanosController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CanjesController;
use Illuminate\Validation\Rules\Can;

// Página de Login (principal)
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Página de inicio después del login (protegida)
Route::get('/inicio', [HomeController::class, 'index'])->middleware('auth')->name('inicio');

// Quiénes somos
Route::get('/quienes-somos', [HomeController::class, 'quienesSomos'])->name('quienes-somos');

// Reciclaje
Route::get('/reciclaje', [ReciclajeController::class, 'index'])->name('reciclaje');

// recompensas
Route::get('/recompensas', [RecompensasController::class, 'index'])
    ->middleware('auth')
    ->name('recompensas');

Route::post('/recompensas/canjear/{codRecom}', [CanjesController::class, 'canjear'])
    ->middleware('auth')
    ->name('recompensas.canjear');

// Historial de canjes
Route::get('/canjes/historial', [CanjesController::class, 'historial'])
    ->middleware('auth')
    ->name('canjes.historial');


// Participación ciudadana
Route::get('/participacion', [ParticipacionController::class, 'index'])->name('participacion');

Route::view('nosotros', 'nosotros')->name('nosotros');

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');