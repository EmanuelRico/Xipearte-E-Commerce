<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_size;
use App\Models\Product_category;
use App\Models\Category;


class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    

    public function create(Request $request){
        $categories = Category::all();
        

        $product = New Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->stock = $request->stock;
        $product->save();

        foreach($request->file('images') as $file){
            $imagen = new Image();
            $name = $file->getClientOriginalName();
            $dest = 'img';
            $file->move($dest,$name);
            $imagen->route = $dest.'/'.$name;
            $imagen->product_id = $product->id;
            $imagen->save();
        }

        foreach ($categories as $c) {
            if(isset($_POST["categorie".$c->id])){
                $new_c = new Product_category();
                $new_c->product_id = $product->id;
                $new_c->category_id = $c->id;
                $new_c->save();
            }
        }

       
        
        $msg = "Creado exitosamente";
        return redirect('panelControl')->with('msg', $msg);
    }

    public function update(Request $request){
        $product = Product::find((int)$request->id);
        $categories = Category::all();
        //si encuentra el producto mandando por medio del id, crea un nuevo producto
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = (float)$request->price;
            $product->origin = $request->origin;
            $product->stock = $request->stock;
            $product->save();
            //si se mandan imagenes, las sobreescribe
            if($request->file('images')) Image::where('product_id', $product->id)->delete();
            foreach($request->file('images') as $file){
                $imagen = new Image();
                $name = $file->getClientOriginalName();
                $imagen->route = $file->storeAs('img', $name,'public');
                $imagen->product_id = $product->id;
                $imagen->save();
            }

            Category::where('product_id', $product->id)->delete();
            foreach ($categories as $c) {
                if(isset($_POST["categorie".$c->id])){
                    $new_c = new Product_category();
                    $new_c->product_id = $product->id;
                    $new_c->category_id = $c->id;
                    $new_c->save();
                }
            }
            $msg = "Actualizado exitosamente";
            return redirect('administrarProductos')->with('msg', $msg);
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('updateProduct', compact('msg'));
        }
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        
        if($product){
            Image::where('product_id',$request->id)->delete();
            Product_size::where('product_id',$request->id)->delete();
            Product_category::where('product_id',$request->id)->delete();
            $product->delete();
            $msg = "Eliminado exitosamente";

            return redirect('panelControl')->with('msg', $msg);
        }
        else{
            $msg = "No se pudo eliminar";
            return view ('deleteProduct',compact('msg'));
        }
    }

    public function manageProductsScreen()
    {
        $product = Product::select('products.id as id', 'products.name as name', 'products.description as description', 'images.route')->join('images', 'products.id', 'images.product_id')->orderBy('name')->get();
        return view('manageProducts', compact('product'));
    }

    

    public function viewProductsEdit($id)
    {
        dd($id);
        $p = Product::find($id);
        dd($p);
        $categories = Category::all();
        $cat = Product_category::where('product_id', $p->id)->get();
        return view('editProduct',compact('categories','cat'))->with('p', $p);
    }
}
