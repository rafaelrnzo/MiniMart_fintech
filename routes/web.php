<?php

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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::prefix('/kantin')->group(function(){
    Route::get('/', [App\Http\Controllers\CanteenController::class, 'index'])->middleware('web', 'role.kantin')->name('kantin');
    Route::delete('/delete/{id}', [App\Http\Controllers\CanteenController::class, 'destroy'])->middleware('web', 'role.kantin')->name('deleteProduct');
    Route::post('/create', [App\Http\Controllers\CanteenController::class, 'store'])->middleware('web', 'role.kantin')->name('product.store');
  })->name('kantin');


  Route::get('/bank', [App\Http\Controllers\BankController::class, 'index'])->middleware('web', 'role.bank')->name('bank');
  Route::put('/topup/{id}', [App\Http\Controllers\TransactionController::class, 'topUpSuccess']);
  
  Route::prefix('/user')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:siswa')->name('home');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::post('/addToCart', [App\Http\Controllers\TransactionController::class, 'addToCart'])->name('addToCart');
    Route::post('/payNow', [App\Http\Controllers\TransactionController::class, 'payNow'])->name('pay');
    Route::post('/topUp', [App\Http\Controllers\TransactionController::class, 'topUp'])->name('topUp');
    Route::get('/download{order_id}', [App\Http\Controllers\TransactionController::class, 'download'])->name('download');
  })->name('user');
});




// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::middleware(['auth', 'role:user'])->group(function () {
// });

// Route::middleware(['auth', 'role:kantin'])->group(function () {
//   Route::get('/', [App\Http\Controllers\CanteenController::class, 'index']);
// });


// Route::prefix('/')->group(function () {
//   Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profileKantin');
//   Route::post('/addToCart', [App\Http\Controllers\TransactionController::class, 'addToCart'])->name('addToCart');
//   Route::post('/payNow', [App\Http\Controllers\TransactionController::class, 'payNow'])->name('pay');
//   Route::post('/topUp', [App\Http\Controllers\TransactionController::class, 'topUp'])->name('topUp');
//   Route::get('/download{order_id}', [App\Http\Controllers\TransactionController::class, 'download'])->name('download');
// });

// Route::prefix('/kantin')->group(function () {
//   Route::get('/', [App\Http\Controllers\CanteenController::class, 'index']);
//   Route::get('/profile', [App\Http\Controllers\CanteenController::class, 'profile'])->name('profile');
// });
