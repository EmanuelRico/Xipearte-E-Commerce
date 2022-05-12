<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function home(){
        return view("welcome");
    }

    //return product view
    public function product($product_id){
        if(isset($product_id)){
            $product_id = intval($product_id);
            $p = Product::where('id',$product_id)->first();
            if(!is_null($p)){ //verify if the product exist
                $images = Image::where("product_id",$product_id)->get(); //obtain product images
                $sizes = Product_size::where("product_id",$product_id)->get(); //otain product sizes info
                return view("product",compact('p','images','sizes'));
            }else
                return view("error_views/product_not_found");
        }
        else
            return view("error_views/product_not_found");
    }

    //return the category view
    public function category($categorie){
        if(isset($categorie)){
            $c = Category::where('name', $categorie)->first();
            if(!is_null($c)){
                $products_id = Product_category::where('category_id',$c->id)->get();//obtain all the products with that categorie
                $products = []; //array to save the products with the category
                foreach($products_id as $id){
                    array_push($products,Product::where('id',$id->product_id)->first());
                }
                return view("category",compact("c","products"));
            }else
                return view("error_views/category_not_found");
        }else
            return view("error_views/category_not_found");
    }

    public function cart() {
        return view('cart');
    }

    public function addToCart($id) {
        $producto = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id] ['cantidad']++;
        } else {
            $cart[$id] = [
                "name" => $producto->name,
                "quantity" => 1,
                "price" => $producto->price
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function update(Request $request) {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id] ['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    public function remove (Request $request) {
        if ($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function clearCarrito (){
        $request->session()->forget('cart');
    }
}
