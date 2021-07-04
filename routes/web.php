<?php

use App\Http\Controllers\MoneyController;
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
http://127.0.0.1:8000/product/iphone/4000
Route::get('/product/{name}/{price}',function($name,$price){
    echo "ชื่อสินค้า :$name<br>";
    echo "ราคา :$price";
});
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/admin',[MoneyController::class,'index'])->name('admin');
Route::post('/admin/add',[MoneyController::class,'addMoney'])->name('NameAddTbmoney');
Route::get('/admin/edit/{id}',[MoneyController::class,'edit']);
Route::post('/admin/update/{id}',[MoneyController::class,'update'])->name('NameEditTransection');
Route::get('/admin/delete/{id}',[MoneyController::class,'delete']);

