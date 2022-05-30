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
use App\Controllers\SaleDetailsController;

class SaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function Pedido () {
        return view('addDirection');
    }

    public function createOrder(Request $request) {
        $order = new Sale();
        $cart = $request->session()->get('cart');
        $order->user_id = $request ->user_id;
        $order->total = $request ->total;
        $order->direccion = $request ->direccion;
        $order->save();
        $request->session()->forget('cart');
        $orderDetails = new SaleDetailsController;
    }
}
