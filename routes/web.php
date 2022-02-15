<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/language/{lang}', [PageController::class, "setlanguage"]);

Route::group([ 'prefix' => 'account', 'middleware' => 'guest' ], function () {
    Route::get('/register', [AccountController::class, 'showRegisterForm'])->name('account.register');
    Route::post('/register', [AccountController::class, 'register'])->name('account.register');

    Route::get('/login', [AccountController::class, 'showLoginForm'])->name('account.login');
    Route::post('/login', [AccountController::class, 'login'])->name('account.login');
});

Route::group([ 'prefix' => 'account', 'middleware' => 'user' ], function() {
    Route::get('/update', [AccountController::class, 'showUpdateForm'])->name('account.update');
    Route::post('/update', [AccountController::class, 'update'])->name('account.update');
    Route::post('/destroy', [AccountController::class, 'destroy'])->name('account.destroy');

    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
});

Route::group([ 'prefix' => 'account', 'middleware' => 'admin' ], function() {
    Route::get('/maintenance', [AccountController::class, 'showMaintenanceForm'])->name('account.maintenance');
    Route::post('/maintenance', [AccountController::class, 'maintenance'])->name('account.maintenance');
});

Route::resource('/ebook', EBookController::class);

Route::group([
    'prefix' => 'order',
    'as' => 'order.',
    'middleware' => 'auth',
], function () {
    Route::get('/', [OrderController::class, 'history'])->name('history');
    Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
    Route::post('/add', [OrderController::class, 'add'])->name('add');
    Route::post('/delete', [OrderController::class, 'delete'])->name('delete');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/{order}', [OrderController::class, 'show'])->name('show');
});

Route::any('{query}', function() {
    return redirect('/');
}) ->where('query', '.*');
