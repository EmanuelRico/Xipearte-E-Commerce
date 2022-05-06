<?php

use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if(Auth::user()->type==2){
        return redirect('panelControl');
    }
    else{
        return redirect('/') ;
    }
})->name('dashboard');

Route::get('/producto', function () {
    return view('producto');
});

Route::get('/producto/{product_id}', [HomeController::class, 'product']);

Route::get('/panelControl',function(){
    if(Auth::user()->type==2){
        return view('panel');
    }
    if(Auth::user()->type!=2){
        return redirect('/') ;
    }
});