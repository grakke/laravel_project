<?php

use App\Http\Controllers\CourseController;
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
Route::apiResource('courses', CourseController::class);

Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/profile', function () {
        echo 'Hello';
    });
});

Route::get('api/users/{user}', function (\App\Models\User $user) {
    return $user->email;
});

Route::apiResource('photos', 'PhotoController');
Route::apiResources([
    'photos' => 'PhotoController',
    'posts' => 'PostController'
]);
