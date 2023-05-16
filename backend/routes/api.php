<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DefaultController;

use App\Http\Controllers\Users\UserCreatorController;
use App\Http\Controllers\Users\UserGetterController;
use App\Http\Controllers\Users\UserListController;
use App\Http\Controllers\Users\UserQuantityController;
use App\Http\Controllers\Users\RootUserGetterController;

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

Route::group(['middleware' => ['cors']], function() {
    Route::prefix('users')->group(function() {
        Route::get('/root', RootUserGetterController::class);
        Route::get('/', UserListController::class);
        Route::get('/quantity', UserQuantityController::class);
        Route::get('/{id}', UserGetterController::class);        
        Route::post('/', UserCreatorController::class);
    });

    Route::get('/', DefaultController::class);
});