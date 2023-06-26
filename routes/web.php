<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;

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

Route::prefix('/user')->name('user.')->group(function (){
    Route::get('/login_form',[AuthController::class,'login_form'])->name('login_form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
});

require __DIR__.'/setup.php';
require __DIR__.'/manage_student.php';
