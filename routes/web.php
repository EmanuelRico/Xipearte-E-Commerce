<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleDetailsController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;



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

Route::get('/', [HomeController::class, 'home']);

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
/*
Route::get('/administrarUsuarios', function () {
    return view('manageUsers');
});*/

Route::get('/producto/{product_id}', [HomeController::class, 'viewProduct']);

Route::get('/panelControl', [adminController:: class, 'panelControl']);

Route::get('/añadirProducto', [adminController::class, 'pantallaNP']);
Route::get('/pedidosA',[adminController::class, 'viewOrders']);

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/add-to-cart', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [HomeController::class, 'update'])->name('update.cart');
Route::delete('olvidar', [HomeController::class, 'clearCarrito'])->name('clearCarrito.from.cart');
Route::delete('/remove-from-cart', [HomeController::class, 'remove'])->name('remove.from.cart');

//ver categorias usuario comun
Route::get('/categoria/{id}',[HomeController::class, 'viewCategory']);
Route::get('/categorias',[HomeController::class, 'viewCategories']);

Route::post('/saveCategory',[CategoryController::class, 'saveCategory']);
Route::get('/nuevaCategoria',[CategoryController::class, 'pantallaNuevaCategoria']);
Route::get('/administrarCategorias',[CategoryController::class, 'manageCategoriesScreen']);
Route::get('/editarCategoria/{id}', [CategoryController::class, 'viewCategoryEdit']);
Route::post('/actualizarCategoria',[CategoryController::class, 'update']);
Route::post('/eliminarCategoria',[CategoryController::class, 'delete']);

//rutas productos
Route::post('/nuevoProducto',[ProductController::class,'create']);
Route::post('/subirImagenes/{id}',[ProductController::class,'subeImagenes']);

Route::get('/administrarProductos',[ProductController::class, 'manageProductsScreen']);
Route::get('/editarProducto/{id}', [ProductController::class, 'viewProductsEdit']);
Route::delete('/eliminaFoto/{id}',[ProductController::class,'eliminaFoto']);
Route::post('/actualizarProducto',[ProductController::class, 'update']);
Route::post('/eliminarProducto', [ProductController::class, 'delete']);
Route::delete('/olvidar', [HomeController::class, 'clearCarrito'])->name('clearCarrito.from.cart');

Route::get('/nosotros',[HomeController::class, 'aboutUs']);


Route::get('/productos',[HomeController::class,'productsScreenUser']);

Route::get('/buscar',[HomeController::class,'buscarProductos']);

Route::get('/address',[SaleController::class, 'Pedido']);
Route::post('/saveAdd',[SaleController::class, 'saveAdd']);
Route::post('/guiaRastreo/{id}',[SaleController::class, 'guiaRastreo']);
Route::post('/crearOrden',[SaleController::class, 'createOrder'])->name('crearOrden');
Route::get('/pedidos',[SaleController::class, 'viewOrders']);
Route::get('/detalles/{id}', [SaleDetailsController::class, 'viewOrder']);

Route::get('/AdministrarRoles', [adminController::class, 'viewUsers']);
Route::get('/AdministrarRoles/{id}/{type}', [AdminUserController::class, 'changeUserType']);

Route::get('/pagoExitoso/{id}',[SaleController::class,'pagoExitoso']);


Route::get('/send',[MailController::class,'index']);