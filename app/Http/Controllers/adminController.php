<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sale;

use App\Models\User;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function panelControl()
    {
        $sales = Sale::where('status','>',1)->get();
        foreach ($sales as $s) {
            $s->user;
            $s->sold_product;
            foreach ($s->sold_product as $sp) {
                $sp->product->imagenes;
            }
            // $s->sold_product->
        }
        // return dd($sales);
        return view('panel', compact('sales'));
    }

    public function pantallaNP()
    {
        $categories = Category::where('status', 1)->get();
        return view('addProduct', compact('categories'));
    }

    public function viewOrders()
    {
        $orders = Sale::where('status',2)->get();
        foreach ($orders as $o) {
            $o->user;
        }
        return view('ordersAdmin')->with('orders', $orders);
    }

    public function viewUsers()
    {
        $user = auth()->user();
        $users = User::select('id', 'name', 'email', 'type')
            ->where([
                ['id', '!=', $user->id],
                ['id', '!=', 1]
            ])->get();
        return view('manageUsers', compact('users'));
    }
}
