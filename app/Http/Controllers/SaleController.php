<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use App\Models\Sale;
use App\Models\Sold_product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Controllers\SaleDetailsController;
use Auth;

class SaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function Pedido () {
        return view('addDirection');
    }

    public function saveAdd (Request $request) {
        $dir = [
            'Calle' => $request->street,
            'Numero Exterior' => $request->exteriorNumber,
            'Numero Interior' => $request->interiorNumber,
            'Colonia' => $request->colonia,
            'Codigo Postal' => $request->postalCode,
            'Referencias' => $request->references,
            'Municipio' => $request->municipio,
            'Estado' => $request->state,
        ];
        // $direccion = json_encode($dir);
        // dd($direccion);
        return view("createOrder")->with('direccion', $dir);
    }

    public function createOrder(Request $request) {
        $order = new Sale();
        $cart = $request->session()->get('cart');
        if ($cart) {
            $order->user_id = $request ->user_id;
            $order->direccion = $request ->address;
            $order->total = $request ->total;
            $order->save();
            $request->session()->forget('cart');
            foreach($cart as $c){
                $o = new Sold_product();
                $o->user_id = $request->user_id;
                $o->sale_id = $order->id;
                $o->product_id = $c['product_id'];
                $o->cantidad = $c['quantity'];
                $o->price = $c['price'];
                $o->final_price = $c['quantity'] * $c['price'];
                $o->save();
                // return dd ($o);
            }
            // $orderDetails = new SaleDetailsController;
            // $orderDetails->createDetails($request->user_id, $order->id, json_encode($cart), $order->total);
        }
        return redirect('/productos');
    }

    public function viewOrders() {
        $user_id = Auth::user()->id;
        $orders = Sale::query()->where('user_id', '=', $user_id)->get();
        return view('ordersUser')->with('orders', $orders);
    }

    public function viewDirecc($orderID) {
        $orders = Sale::query()->where('id', '=', $orderID)->get();
        return view('ordersUser')->with('orders', $orders);
    }
    
}
