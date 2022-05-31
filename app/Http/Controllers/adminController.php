<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Sold_product;

class adminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function panelControl() {
        return view('panel');
    }

    public function pantallaNP () {
        $categories = Category::all();
        return view('addProduct',compact('categories'));
    }

    public function viewOrders() {
        $orders = Sale::all();
        return view('ordersAdmin')->with('orders', $orders);
    }
}
