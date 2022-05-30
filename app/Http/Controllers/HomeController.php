<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isNull;

class HomeController extends Controller
{
    public function home()
    {
        $productos = DB::table('products')
            ->orderBy('id', 'asc')
            ->take(6)
            ->get();
        $images = [];
        foreach ($productos as $p) {
            $img = DB::table('images')
                ->where('product_id', $p->id)->first();
            $images = Arr::add($images, $p->id, $img);
        }

        return view("welcome")->with('productos', $productos)->with('img', $images);
    }

    //return product view
    public function product($id)
    {
        if (isset($id)) {
            $product_id = intval($id);
            $p = Product::find($product_id);
            if(!is_null($p)){ //verify if the product exist
                $images = Image::where("product_id",$product_id)->get(); //obtain product images
                $sizes = Product_size::where("product_id",$product_id)->get(); //otain product sizes info
                return view("product",compact('p','images','sizes'));
            }else
                return view("error_views/product_not_found");
        } else
            return view("error_views/product_not_found");
    }

    //return the category view
    public function category($categorie)
    {
        if (isset($categorie)) {
            $c = Category::where('name', $categorie)->first();
            if (!is_null($c)) {
                $products_id = Product_category::where('category_id', $c->id)->get(); //obtain all the products with that categorie
                $products = []; //array to save the products with the category
                foreach ($products_id as $id) {
                    array_push($products, Product::where('id', $id->product_id)->first());
                }
                return view("category", compact("c", "products"));
            } else
                return view("error_views/category_not_found");
        } else
            return view("error_views/category_not_found");
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id = null)
    {
        $producto = Product::findOrFail($id);
        if ($producto) {
            $cart = session()->get('cart', []);
            $img = DB::table('images')->where('product_id', $producto->id)->first();
            $image = $img->route;
            

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $producto->name,
                    "quantity" => 1,
                    "image" => $image,
                    "price" => $producto->price
                ];
                
            }
            dd($cart);
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function clearCarrito()
    {
        $request->session()->forget('cart');
    }

    public function viewProduct($id)
    {
        $product_id = intval($id);
        $producto = Product::find($product_id);
        $sizes = Product_size::where('product_id', $product_id)->get();
        $images = Image::where('product_id',$product_id)->get();

        $productos = DB::table('products')
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();
        $imgAdd = [];
        foreach ($productos as $p) {
            $img = DB::table('images')
                ->where('product_id', $p->id)->first();
            $imgAdd = Arr::add($imgAdd, $p->id, $img);
        }

        return view('product', compact('producto', 'sizes','images','productos','imgAdd'));
    }

    public function viewCategories()
    {
        $category = Category::all();
        return view('categories', compact('category'));
    }
    //Ver categoria en especifico
    public function viewCategory($id)
    {
        $category = Category::find($id);
        $products = Product::join('product_categories as pc', 'pc.product_id', 'products.id')->where('pc.category_id', $id)->join('images', 'products.id', 'images.product_id')->get();
        
        return view('category_view', compact('category','products'));
    }
}
