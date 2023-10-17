<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
// Auth::routes();
// Route::get('/register', function(){
//     return view('auth.register');
// });


// Route::post('/register', 'RegisterController@register')->name('register.perform');
Route::get('/register',[RegisterController::class, 'show']);
Route::post('/register',[RegisterController::class, 'register']);

Route::get('/login',[LoginController::class, 'show']);
Route::post('/login',[LoginController::class, 'login']);


Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/logout',[LogoutController ::class, 'logout'])->name('logout');