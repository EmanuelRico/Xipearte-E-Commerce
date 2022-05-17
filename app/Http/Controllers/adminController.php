<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use Illuminate\Http\Request;

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
        return view('addProduct');
    }
    public function addCategory(){
        return view('addCategory');
    }
}
