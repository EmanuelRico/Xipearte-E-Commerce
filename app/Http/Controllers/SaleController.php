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
use Mail;
use App\Mail\NuevoPedidoAdmin;
use App\Mail\ConfirmacionPedido;
use App\Mail\PedidoEnviado;



class SaleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function Pedido () {
        $cart = session()->get('cart');
        if($cart!=null){
            foreach ($cart as $c) {
                $product_id = $c['product_id'];
                $quantity = $c['quantity'];
                $size = $c['size'];
                $stock = Product_size::where('product_id',$product_id)->where('size', $size)->first();
                // return(dd($stock));
                $name = Product::where('id',$product_id)->first();
                $available = $stock->stock - $quantity;
                if($available < 0) {
                    $message = 'No existen suficientes piezas de '. $name->name.' '. $size. ' en stock';
                    session()->flash('message', $message);
                    session()->flash('message-type', 'success');
                    return redirect('/cart');
                }
            }
            return view('addDirection');
        }elseif ($cart==null){
            session()->flash('message', 'No tienes productos en el carrito');
            session()->flash('message-type', 'success');
            return redirect('/cart');
        }
        
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
        
        \Stripe\Stripe::setApiKey(config('services.stripe.secret') );
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
                // $request->session()->forget('cart');
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
            return $e;
        }

    }

    public function viewOrders() {
        $user_id = Auth::user()->id;
        $orders = Sale::query()->where('user_id', '=', $user_id)->where('status','>',1)->get();
        return view('ordersUser')->with('orders', $orders);
    }

    public function viewDirecc($orderID) {
        $orders = Sale::query()->where('id', '=', $orderID)->get();
        return view('ordersUser')->with('orders', $orders);
    }

    public function subInventory($id, $quant, $size){
        #return dd($id);
        $product = Product_size::where('product_id',$id)->where('size', $size)->first();
        $current = $product->stock;
        $product->stock = $current - $quant;
        $product->save();

        $product2 = Product::findOrFail($id);
        $stock2 = $product2->stock;
        $product2->stock = $stock2 - $quant;
        $product2->save();
    }

    public function pagoExitoso($id)
    {
        $order = Sale::findOrFail($id);
        $order->status = 2;
        $order->save();
        foreach($order->sold_product as $detalleOrden){
            $detalleOrden->product;
            $id = $detalleOrden->product_id;
            $quant = $detalleOrden->cantidad;
            $size = $detalleOrden->size;
            $this -> subInventory($id, $quant, $size);
            $detalleOrden->status = 2;
            $detalleOrden->save();
        }
        $order->user;
        
        //Confirmacion de pedido al cliente
        Mail::to($order->user->email)->send(new ConfirmacionPedido($order));

        //Aviso al admin de nuevo pedido
        Mail::to('fejerogo.17@gmail.com')->send(new NuevoPedidoAdmin($order));
        session()->forget('cart');
        return view('pagoExitoso')->with('order',$order)->with('direccion',json_decode($order->direccion));
    }

    public function guiaRastreo(Request $request, $id)
    {
        $order = Sale::findOrFail($id);
        $order->status = 3;
        $order->guiaRastreo = $request->guia;
        $order->paqueteria = $request->paqueteria;
        $order->save();

        foreach($order->sold_product as $detalleOrden){
            $detalleOrden->product;
        }
        $order->user;

        Mail::to($order->user->email)->send(new PedidoEnviado($order));
        $request->session()->flash('message', 'Guía de rastreo añadida exitosamente');
        $request->session()->flash('message-type', 'success');
        
        return response()->json(["status"=>true]); 
    }
    
}
