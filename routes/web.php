<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewComposers;
use \App\Http\Controllers\Upload;
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

Route::get('/',[ViewComposers::class,'home']);

Route::get('submit',[ViewComposers::class,'submit']);

Route::get('comment/{id}',[ViewComposers::class,'comment']);

Route::get('more',[ViewComposers::class,'more']);

Route::get('about',function (){
    return view('about');
});


Route::post('submit',[Upload::class,'submit']);
Route::get('ok',[Upload::class,'submit']);
Route::post('like',[Upload::class,'like']);
Route::post('comment',[Upload::class,'comment']);
Route::get('Captcha',[Upload::class,'Captcha']);
