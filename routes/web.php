<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\SocialGithubController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::group(function (){
//     Route::get('/post', [PostController::class, 'index'])->name('posts.index')->middleware('second-gate');
//     Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//     Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//     Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//     Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
//     Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');
//     Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

//     // Comments Routes
//     Route::post('/comments/{postId}', [CommentController::class, 'create'])->name('comments.create');
//     Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete');
//     Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view');
//     Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update');

// })->middleware('auth');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('second-gate');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');

    // Comments Routes
    Route::post('/comments/{postId}', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');
    Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete')->middleware('auth');
    Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view')->middleware('auth');
    Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update')->middleware('auth');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    // Route::get('/auth/redirect', function () {
    //     return Socialite::driver('github')->redirect();

    // });

    // Route::get('/auth/callback', function () {
    //     $githubUser = Socialite::driver('github')->user();
        
    //     // make request to github api to get user info
    //     $user = User::where('github_id', $githubUser->id);

    //     if($user){
    //         Auth::login($user);
    //         return redirect('/posts');
    //     }else{

    //         $user = User::create([
    //             'name' => $githubUser->name,
    //             'email' => $githubUser->email,
    //             'social_id' => $githubUser->id,
    //             'social_type' => 'github',
    //             'password' => encrypt('12345678'),
    //         ]);

    //         Auth::login($user);
    //         return redirect('/posts');
    //     }

        

    // });

    Route::get('auth/github', [SocialGithubController::class, 'redirectToGithub']);
    Route::get('callback/github', [SocialGithubController::class, 'handleCallback']);

    Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
    Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);