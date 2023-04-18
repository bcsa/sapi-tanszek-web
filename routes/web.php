<?php

use App\Http\Controllers\RendezvenyController;
use App\Http\Controllers\TanarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', 'AdminController@index')->name('home');


//Auth::routes();

//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');

//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('profile', 'AdminController@index')->name('profile');
Route::post('profile', 'AdminController@store')->name('submit-profile');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('rendezvenyek', RendezvenyController::class);

Route::resource('tanarok', TanarController::class);

Route::get('proxy', function () {
    $request = Http::withHeaders([
        'User-Agent' => 'KSARetail/1.1 CFNetwork/1406.0.4 Darwin/22.4.0'
    ])
        ->timeout(60)
        ->get("https://ksaretail.ro/shop/app/products");

    $response = $request->json();

    echo json_encode($response, JSON_PRETTY_PRINT);
})->name('proxy');

