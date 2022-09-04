<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sold_product;
use App\Http\Controllers\SaleController;

class SaleDetailsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function createDetails($idUser, $orderID, $products, $total){
        $orderDetails = new Sold_product();
        $orderDetails->user_id = $idUser;
        $orderDetails->sale_id = $orderID;
        $orderDetails->products = $products;
        $orderDetails->final_price = $total;
        $orderDetails->save();
    }

    public function viewOrder($order_id = null) {
        if(!is_null($order_id)) {
            $order = Sold_product::where('sale_id',$order_id)->get();
            foreach($order as $o){
                $o->product;
                $o->sale;
                $o->sale->user;
            }
            return response ($order);
        } else
        return redirect('/pedidos');
    }
}
