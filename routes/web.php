<?php

use App\Http\Controllers\ProfileController;
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

//Route::get('/', 'ProfileController@index')->name('home');

Auth::routes(['register' => false, 'confirm' => false]);

Route::get('/', [RendezvenyController::class, 'home'])->name('rendezvenyek.home');
Route::get('/tanarok', [TanarController::class, 'home'])->name('tanarok.home');

Route::post('/tanarok/search/{var}', [TanarController::class, 'search'])->name('tanarok.search');
Route::post('/rendezvenyek/search/{var}', [RendezvenyController::class, 'search'])->name('rendezvenyek.search');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile', [ProfileController::class, 'store'])->name('submit-profile');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/rendezvenyek/{rendezveny}/toggle-relation', [RendezvenyController::class, 'toggleTanarRelation'])->name('rendezvenyek.toggle-relation');

    Route::resource('rendezvenyek', RendezvenyController::class)->parameters([
        'rendezvenyek' => 'rendezveny'
    ]);

    Route::resource('tanarok', TanarController::class)->parameters([
        'tanarok' => 'tanar'
    ]);
});

Route::get('proxy', function () {
    $request = Http::withHeaders([
        'User-Agent' => 'KSARetail/1.1 CFNetwork/1406.0.4 Darwin/22.4.0'
    ])
        ->timeout(60)
        ->get("https://ksaretail.ro/shop/app/products");

    $response = $request->json();

    echo json_encode($response, JSON_PRETTY_PRINT);
})->name('proxy');

