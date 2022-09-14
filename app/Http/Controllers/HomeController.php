<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_size;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\isNull;
use ArrayObject;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $sales = Sale::all();

        if (Auth::check()) {
            if (Auth::user()->type == "2") {
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
            } else if (Auth::user()->type == "1") {

                $productos = Product::where('status', 1)->orderBy('id', 'asc')
                    ->take(6)
                    ->get();
                $images = [];
                foreach ($productos as $p) {
                    $p->imagenes;
                }

                $carousel = Product::where('status', 1)->orderBy('id', 'desc')->take(4)->get();
                $images_carousel = new ArrayObject;
                foreach ($carousel as $p) {
                    $img = Image::where('product_id', $p->id)->first();
                    $array_o = array($p->id, $img->route);
                    $images_carousel->append($array_o);
                }

                return view("welcome", compact('productos', 'images_carousel'));
            }
        } else {
            $productos = Product::where('status', 1)->orderBy('id', 'asc')
                ->take(6)
                ->get();
            $images = [];
            foreach ($productos as $p) {
                $p->imagenes;
            }

            $carousel = Product::where('status', 1)->orderBy('id', 'desc')->take(4)->get();
            $images_carousel = new ArrayObject;
            foreach ($carousel as $p) {
                $img = Image::where('product_id', $p->id)->first();
                $array_o = array($p->id, $img->route);
                $images_carousel->append($array_o);
            }
            return view("welcome", compact('productos', 'images_carousel'));
        }
    }

    //return product view
    public function product($id)
    {
        if (isset($id)) {
            $product_id = intval($id);
            $p = Product::find($product_id);
            if (!is_null($p)) { //verify if the product exist
                $images = Image::where("product_id", $product_id)->get(); //obtain product images
                $sizes = Product_size::where("product_id", $product_id)->get(); //otain product sizes info
                return view("product", compact('p', 'images', 'sizes'));
            } else
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
                    "rImage" => $image,
                    "price" => $producto->price,
                    "product_id" => $producto->id
                ];
            }
        }

        session()->put('cart', $cart);
        // dd($cart);
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
        $producto->imagenes;

        $productos = Product::orderBy('id', 'asc')
            ->take(5)
            ->get();
        foreach ($productos as $p) {
            $p->imagenes;
        }
        return view('product', compact('producto', 'sizes', 'productos'));
    }

    public function viewCategories()
    {
        $category = Category::where('status', 1)->paginate(15);
        return view('categories', compact('category'));
    }
    //Ver categoria en especifico
    public function viewCategory($id)
    {
        $category = Product_category::where('category_id', '=', $id)->paginate(15);
        $categoryName = Category::where('id', $id)->first()->name;
        foreach ($category as $pc) {
            $pc->product;
            $pc->product->imagenes;
            $pc->category;
        }
        // return dd($category);

        return view('category_view', compact('category', 'categoryName'));
    }

    public function aboutUs()
    {
        return view('nosotros');
    }

    public function productsScreenUser()
    {
        $product = Product::where('status', 1)->orderBy('name')->paginate(15);
        foreach ($product as $p) {
            $p->imagenes;
        }
        return view('products', compact('product'));
    }

    public function buscarProductos(Request $request)
    {
        $search = $request->input('search');
        $productos = Product::where('status', 1)->where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->paginate(15);
        if ($productos->isEmpty()) {
            $productos = [];
            return view('search')->with('productos', $productos)->with('coinci', $search);
        }
        $images = [];
        foreach ($productos as $p) {
            $p->imagenes;
        }
        return view('search')->with('productos', $productos)->with('coinci', $search);
    }
}
