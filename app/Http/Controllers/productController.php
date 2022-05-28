<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function create(Request $request){
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
        $msg = "Creado exitosamente";
        return redirect('panelControl')->with('msg', $msg);
    }

    public function update(Request $request){
        $product = Product::find((int)$request->id);
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
            $msg = "Actualizado exitosamente";
            return redirect('administrarProductos')->with('msg', $msg);
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('updateProduct', compact('msg'));
        }
    }

    public function delete($id){
        $product = Product::find($id);
        
        if($product){
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
        $product = Product::all();

        return view('manageProducts', compact('product'));
    }

    public function viewProductsEdit($id)
    {
        $p = Product::find($id);

        return view('editProduct')->with('p', $p);
    }
}
