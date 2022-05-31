<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Sale;
use App\Models\Sold_product;

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
}
