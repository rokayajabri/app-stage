<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\ReceptionsController;
use App\Http\Controllers\ReparationsController;

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

/** for side bar menu active */
function set_active($route) {
    if (is_array($route )){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- main dashboard ------------------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
});

Route::get('/clients', [ClientsController::class,'index'])->name('clients');
Route::post('/clients/store',  [ClientsController::class,'store'])->name('clients.store');
Route::put('/update/clients/{id}',  [ClientsController::class,'update'])->name('clients.update');
Route::delete('/delete/clients/{id}',  [ClientsController::class,'delete'])->name('clients.delete');
Route::get('search/client',  [ClientsController::class,'searchClient'])->name('search.client');

Route::get('/produits', [ProduitsController::class,'index'])->name('produits');
Route::post('/produits/store',  [ProduitsController::class,'store'])->name('produits.store');
Route::put('/update/produits/{id}',  [ProduitsController::class,'update'])->name('produits.update');
Route::delete('/delete/produits/{id}',  [ProduitsController::class,'delete'])->name('produits.delete');
Route::get('search/product',  [ProduitsController::class,'searchProduct'])->name('search.product');


Route::get('/receptions', [ReceptionsController::class,'index'])->name('receptions');
Route::post('/receptions/store',  [ReceptionsController::class,'store'])->name('receptions.store');
Route::put('/update/receptions/{id}',  [ReceptionsController::class,'update'])->name('receptions.update');
Route::delete('/delete/receptions/{id}',  [ReceptionsController::class,'delete'])->name('receptions.delete');
Route::get('search/reception',  [ReceptionsController::class,'searchreception'])->name('search.reception');

Route::get('/reparations', [ReparationsController::class,'index'])->name('reparations');
Route::delete('/delete/reparations/{id}',  [ReparationsController::class,'delete'])->name('reparations.delete');
Route::get('modifRepa/{id}',  [ReparationsController::class,'modifier'])->name('reparations.modifRepa');
Route::put('/update/reparations/{id}',  [ReparationsController::class,'update'])->name('reparations.update');
Route::get('search/reparation',  [ReparationsController::class,'searchreparation'])->name('search.reparation');



// -----------------------------login----------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});


// ------------------------------ register ----------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');
});

// ----------------------------- forget password ----------------------------//
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'getEmail')->name('forget-password');
    Route::post('forget-password', 'postEmail')->name('forget-password');
});

// ----------------------------- reset password -----------------------------//
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('reset-password/{token}', 'getPassword');
    Route::post('reset-password', 'updatePassword');
});



