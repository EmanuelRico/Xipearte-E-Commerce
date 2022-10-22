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
        session()->put('dir', $dir);
        return view("createOrder")->with('direccion', $dir);
    }

    public function createOrder(Request $request) {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        header('Content-Type: application/json');

        try {
            $amount = 0.0;
            $description = '';
            $order = new Sale();
            $cart = $request->session()->get('cart');
            if ($cart) {
                $order->user_id = $request ->user_id;
                $order->direccion = $request ->direccion;
                $order->total = $request ->total;
                $order->save();
                $request->session()->forget('cart');
                foreach($cart as $c){
                    $o = new Sold_product();
                    $o->user_id = $request->user_id;
                    $o->sale_id = $order->id;
                    $o->product_id = $c['product_id'];
                    $o->cantidad = $c['quantity'];
                    $o->size = $c['size'];
                    $o->price = $c['price'];
                    $o->final_price = $c['quantity'] * $c['price'];
                    $amount = $amount + $c['quantity'] * $c['price'];
                    $description = $description . ' ' . $c['name'] .',';
                    $o->save();
                }
            }

            $amount += 299;
            session()->put('amount', $amount);
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

            
            $user = Auth::user();
            session()->put('user', $user->id);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
                'order_id' => $order->id
            ];

            echo json_encode($output);
            // return $output;
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }

    }

    public function viewOrders() {
        $user_id = Auth::user()->id;
        $orders = Sale::query()->where('user_id', '=', $user_id)->where('status',2)->get();
        return view('ordersUser')->with('orders', $orders);
    }

    public function viewDirecc($orderID) {
        $orders = Sale::query()->where('id', '=', $orderID)->get();
        return view('ordersUser')->with('orders', $orders);
    }

    public function pagoExitoso($id)
    {
        $order = Sale::findOrFail($id);
        $order->status = 2;
        $order->save();
        foreach($order->sold_product as $detalleOrden){
            $detalleOrden->status = 2;
            $detalleOrden->save();
        }
        $order->user;
        
        return view('pagoExitoso')->with('order',$order)->with('direccion',json_decode($order->direccion));
    }
    
}
