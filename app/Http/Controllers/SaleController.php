<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use App\Models\Sale;
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
            $orderDetails = new SaleDetailsController;
            $orderDetails->createDetails($request->user_id, $order->id, json_encode($cart), $order->total);
        }
        return view('products');
    }

    public function viewOrders() {
        $user_id = Auth::user()->id;
        $orders = Sale::query()->where('user_id', '=', $user_id)->get();
        return view('ordersUser')->with('orders', $orders);
    }
    
}
