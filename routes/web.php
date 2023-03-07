<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->user();
//     // $user->token
// });

Route::get('login/github',[LoginController::class,'redirectToProvider'])->name('github.login');
Route::get('login/github/callback',[LoginController::class,'handleProviderCallback']);

