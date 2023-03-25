<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', [SiteController::class, 'loginForm']);
Route::post('/', [SiteController::class, 'login']);

Route::get('/signup', [SiteController::class, 'signUpForm'])->name('signup');
Route::post('/signup', [SiteController::class, 'store']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [SiteController::class, 'logout']);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/create', [MemberController::class, 'create']);
    Route::post('/members', [MemberController::class, 'store']);
    Route::get('/members/edit/{member}', [MemberController::class, 'edit']);
    Route::put('/members/{member}', [MemberController::class, 'update']);

    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::post('/companies', [CompanyController::class, 'store']);
    Route::get('/companies/edit/{company}', [CompanyController::class, 'edit']);
    Route::put('/companies/{company}', [CompanyController::class, 'update']);
});
