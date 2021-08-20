<?php

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

Route::get('/', function () {
    return view('auth/login');
})->name('login');


Route::post('/get-invited', [App\Http\Controllers\HomeController::class, 'getInvited'])
    ->name('get-invited');

Auth::routes();

Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index'])
    ->name('wallet-index')
    ->middleware(['auth']);
Route::get('/wallet/{walletId}', [App\Http\Controllers\WalletController::class, 'coinWallet'])
    ->middleware(['auth']);

Route::get('/myaccount', [App\Http\Controllers\MyaccountController::class, 'index'])
    ->name('myaccount')
    ->middleware(['auth']);
Route::post('/myaccount/update', [App\Http\Controllers\MyaccountController::class, 'update'])
    ->middleware(['auth']);

Route::post('/security/change-password', [App\Http\Controllers\SecurityController::class, 'changePassword'])
    ->name('change-password')
    ->middleware(['auth']);

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::match(['get', 'post'], '/botman', [App\Http\Controllers\BotManController::class, 'handle']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [App\Http\Controllers\Admin\UserManageController::class, 'index'])->name('admin_dashboard');
    Route::get('/userview/{user_id}', [App\Http\Controllers\Admin\UserViewController::class, 'index'])->name('user_view');
    Route::post('/user_update', [App\Http\Controllers\Admin\UserViewController::class, 'update'])->name('user_update');
    Route::post('/user_fund', [App\Http\Controllers\Admin\UserViewController::class, 'fund'])->name('user_fund');
    Route::post('/anchor_deposit', [App\Http\Controllers\Admin\UserViewController::class, 'deposit'])->name('user_deposit');
    Route::post('/anchor_deposit', [App\Http\Controllers\Admin\UserViewController::class, 'deposit'])->name('user_deposit');
});
