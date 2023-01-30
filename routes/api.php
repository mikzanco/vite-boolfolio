<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// tutte le rotte api iniziano con api/.. in questo caso è api/prova
Route::get('prova', function(){

    $success = true;
    $user = [
        'name' =>'Ugo',
        'lastname' => 'De Ughi'
    ];
    return response()->json(compact('success', 'user'));
    // con il metodo qui sotto ottengo un oggetto che ha come oggetto user che ha dentro altri oggetti.
    // return response()->json(compact($user));
});

Route::namespace('Api')
    ->prefix('projects')
    ->group(function(){
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/{slug}', [ProjectController::class, 'show']);
    });


