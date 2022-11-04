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
use App;

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
                //Ultimos productos agregados, máximo solo se mostrarán 10 productos
                $lastProducts = Product::latest()
                ->take(10)
                ->get();
                //Productos con precio menor a 350, máximo solo se mostrarán 10 productos
                $lowcost = Product::where("price","<",350)->take(10)
                ->get();
                //Productos de los cuales quedan menos de 5 piezas, máximo solo se mostrarán 10 productos
                $lastPiecesaux = DB::select("SELECT id FROM products INNER JOIN (SELECT product_id FROM product_sizes GROUP BY product_id HAVING (SUM(stock) < 6)  LIMIT 10) AS PROSI ON products.id = PROSI.product_id");
                $lastPieces = array();
                foreach ($lastPiecesaux as $lp) {
                    $lastPieces1 = Product::where('id', $lp->id)->take(1)->get();
                    array_push($lastPieces, $lastPieces1);
                }
                return view("welcome", compact('productos', 'images_carousel' , 'lastProducts','lowcost','lastPieces'));
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
            //Ultimos productos agregados, máximo solo se mostrarán 10 productos
            $lastProducts = Product::latest()
            ->take(10)
            ->get();
            //Productos con precio menor a 350, máximo solo se mostrarán 10 productos
            $lowcost = Product::where("price","<",350)->take(10)
                ->get();
            //Productos de los cuales quedan menos de 5 piezas, máximo solo se mostrarán 10 productos
            $lastPiecesaux = DB::select("SELECT id FROM products INNER JOIN (SELECT product_id FROM product_sizes GROUP BY product_id HAVING (SUM(stock) < 6)  LIMIT 10) AS PROSI ON products.id = PROSI.product_id");
            $lastPieces = array();
            foreach ($lastPiecesaux as $lp) {
                $lastPieces1 = Product::where('id', $lp->id)->take(1)->get();
                array_push($lastPieces, $lastPieces1);
            }
            return view("welcome", compact('productos', 'images_carousel','lastProducts','lowcost','lastPieces'));
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

    public function addToCart(Request $request)
    {

        $id = $request->id;
        $size = $request->size;
        $producto = Product::findOrFail($id);
        if ($producto) {
            $cart = session()->get('cart', []);
            $img = DB::table('images')->where('product_id', $producto->id)->first();
            $this_size = Product_size::where([['product_id', $producto->id], ['size', $size]])->first();
            if ($this_size) {
                $image = $img->route;
                $fullID = $id.' '.$size;

                if (isset($cart[$fullID])) {
                    $cart[$fullID]['quantity']++;
                } else {
                    $cart[$fullID] = [
                        "id" => $id,
                        "name" => $producto->name,
                        "quantity" => 1,
                        "rImage" => $image,
                        "price" => $producto->price,
                        "product_id" => $producto->id,
                        'size' => $size
                    ];
                }
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

    public function suggestions($id) {
        $allProducts = [];
        $product_id = intval($id);
        $producto = Product::find($product_id);

        $products = Product::where('status', 1)->get();
        foreach ($products as $product) {
            $item = array ('id' => $product->id,
            'price' => $product->price,
            'origin' => $product->origin,
            'category' => (string)Product_category::where('product_id', $product->id)->first(),);
            array_push($allProducts, (object)$item);
        }
        // return(dd($allProducts));
        $productSimilarity = new App\ProductSimilarity($allProducts);
        
        $similarityMatrix = $productSimilarity->calculateSimilarityMatrix();
        $products = $productSimilarity->getProductsSortedBySimularity($product_id, $similarityMatrix);

        return($products);
    }

    public function viewProduct($id)
    {
        $ids = [];
        $productos = collect([]);
        $product_id = intval($id);
        $producto = Product::find($product_id);
        $sizes = Product_size::where('product_id', $product_id)->get();
        $producto->imagenes;

        
        $prod = $this->suggestions($id);

        // dd($prod);

        foreach ($prod as $p) {
            $newId = $p->id;
            $newProd = Product::where('id', $newId)->get();
            $productos->push($newProd);
            array_push($ids, $newId);
        }

        // dd($ids);
        $productos = $productos->flatten();
        //$productos = Product::whereIn('id', $ids)->get();
        //dd($collection);
        foreach ($productos as $p) {
            $p->imagenes;
        }
        //dd($collection);
        $productos = $productos->take(5);

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
