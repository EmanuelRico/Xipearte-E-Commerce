<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     if(Auth::user()->type==2){
//         return redirect('panelControl');
//     }
//     else{
//         return redirect('/') ;
//     }
// })->name('dashboard');
Route::get('/dashboard', [adminController::class, 'panelControl']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    if(Auth::user()->type==2){
//          return redirect('panelControl');
//      }
//      else{
//         return redirect('/') ;
//      }
//  })->name('dashboard');

Route::get('/producto', function () {
    return view('producto');
});

Route::get('/producto/{product_id}', [HomeController::class, 'product']);

Route::get('/panelControl', [adminController:: class, 'panelControl']);

Route::get('/añadirProducto', [adminController::class, 'pantallaNP']);
Route::get('/addCategory', [adminController::class, 'addCategory']);

Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('add-to-cart', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [HomeController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [HomeController::class, 'remove'])->name('remove.from.cart');
Route::delete('olvidar', [HomeController::class, 'clearCarrito'])->name('clearCarrito.from.cart');

Route::post('/saveCategory',[CategoryController::class, 'saveCategory']);