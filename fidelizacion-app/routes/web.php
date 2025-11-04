<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteAdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\BeneficioController;
use App\Http\Controllers\Cliente\PremioClienteController;
use App\Http\Controllers\Cliente\BeneficioClienteController;
use App\Models\Notificacion;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('admin');
    Route::get('/cliente', [ClienteController::class, 'dashboard'])->middleware('cliente');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Rutas del módulo clientes, premios, beneficios
});

Route::middleware(['auth', 'cliente'])->group(function () {
    Route::get('/cliente', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
    // Rutas para visualizar puntos, premios y beneficios
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('clientes', App\Http\Controllers\Admin\ClienteAdminController::class);
    // otras rutas...
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('clientes.')->group(function () {
    Route::resource('clientes', ClienteAdminController::class);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('premios', PremioController::class);
    Route::resource('beneficios', BeneficioController::class);
});

Route::middleware(['auth', 'cliente'])->prefix('cliente')->name('cliente.')->group(function () {
    Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('dashboard');
    Route::get('/premios', [ClienteController::class, 'premios'])->name('premios');
    Route::get('/beneficios', [ClienteController::class, 'beneficios'])->name('beneficios');
});

Route::get('/verificar-voz', function () {
    return view('auth.verificar-voz');
})->middleware('auth')->name('verificar.voz');

Route::prefix('cliente')->middleware(['auth'])->group(function () {
    Route::get('/premios', [PremioClienteController::class, 'index'])->name('cliente.premios');
    Route::get('/beneficios', [BeneficioClienteController::class, 'index'])->name('cliente.beneficios');
});

Route::get('/api/notificaciones', function () {
    return Notificacion::where('visto', false)->latest()->take(1)->get();
});

Route::post('/api/marcar-vista/{id}', function ($id) {
    $notificacion = Notificacion::find($id);
    if ($notificacion) {
        $notificacion->visto = true;
        $notificacion->save();
    }
    return response()->json(['status' => 'ok']);
});

//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//require __DIR__.'/auth.php';
