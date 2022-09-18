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
        // dd($request->state);
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
        // $order = new Sale();
        // $cart = $request->session()->get('cart');
        // if ($cart) {
        //     $order->user_id = $request ->user_id;
        //     $order->direccion = $request ->address;
        //     $order->total = $request ->total;
        //     $order->save();
        //     $request->session()->forget('cart');
        //     foreach($cart as $c){
        //         $o = new Sold_product();
        //         $o->user_id = $request->user_id;
        //         $o->sale_id = $order->id;
        //         $o->product_id = $c['product_id'];
        //         $o->cantidad = $c['quantity'];
        //         $o->size = $c['size'];
        //         $o->price = $c['price'];
        //         $o->final_price = $c['quantity'] * $c['price'];
        //         $o->save();
        //         // return dd ($o);
        //     }
        //     // $orderDetails = new SaleDetailsController;
        //     // $orderDetails->createDetails($request->user_id, $order->id, json_encode($cart), $order->total);
        // }
        \Stripe\Stripe::setApiKey('sk_test_51LeKtWD9BuHAhloGP5UCHUYpKQxPSoHV8ZE7UlnOMFIdlVflmDGHStsDDqhfTlWKL2Dc8LmoJVmFr9pJU8n2zDOx00rOuzT7SC');
        header('Content-Type: application/json');

        try {
            $amount = 0.0;
            $description = '';
            $cart = $request->session()->get('cart');
            if ($cart) {
                foreach($cart as $c){
                    $amount = $amount + $c['quantity'] * $c['price'];
                    $description = $description . ' ' . $c['name'] .',';
                }
            }
            $amount += 299;
            $amount *= 100;
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'mxn',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'description' => $description,
            ]);
            
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

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

    public function pagoExitoso(Request $request)
    {
        return view('pagoExitoso');
    }
    
}
