<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\PremioApiController;
use App\Http\Controllers\Api\BeneficioApiController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/ping', function () {
    return response()->json(['message' => 'API funcionando']);
});
Route::post('/login', function (Request $request) {
    $user = User::where('telefono', $request->telefono)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales inválidas'], 401);
    }

    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'telefono' => $user->telefono,
        'nombre' => $user->nombre,
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/premios', [PremioApiController::class, 'index']);
Route::middleware('auth:sanctum')->get('/beneficios', [BeneficioApiController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/clientes', [ClienteApiController::class, 'index']);
    Route::get('/premios', [PremioApiController::class, 'index']);
    Route::get('/beneficios', [BeneficioApiController::class, 'index']);
});

Route::post('/send-notification', function (Request $request) {
    $data = [
        'title' => $request->input('title', 'Notificación'),
        'body' => $request->input('body', 'Mensaje desde Laravel'),
        'url' => $request->input('url', '/')
    ];

    // Enviar al SW
    return response()->json(['message' => 'Notificación enviada', 'data' => $data]);
});
