<?php

use App\Http\Controllers\Api\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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


Route::get('posts', [PostController::class, 'index'])->middleware('auth:sanctum');
Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts', [PostController::class, 'store']);

Route::post('/sanctum/token', function(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password, $user->password)){
        return response()->json([
            'errors' => [
                'email' => ['Invalid credentials.'],
            ],
        ], 401);
    }
    return $user->createToken($request->email)->plainTextToken;
});