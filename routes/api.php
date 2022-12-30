<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\User;

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


// TODO: API mora da bude autentifikovan preko korisnika - pristup rutama za manipulaciju bazom (create, edit, delete) mogu biti dozvoljene samo autentifikovanih korisnicima
// TODO: API treba da sadrži najmanje 6 ruta
// TODO: API treba da sadrži najmanje 3 različita tipa ruta
// TODO: Kreirati REST API u okviru Laravel aplikacije
// TODO: REST API treba da vraća podatke u json formatu

Route::post('login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response("Failed login", 400);
    }
    return $user->createToken($user->id)->plainTextToken;
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    });
    Route::apiResource('products', ProductController::class);
});
