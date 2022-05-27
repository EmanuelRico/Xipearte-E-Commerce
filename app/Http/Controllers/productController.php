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
        $product->name = $_POST['name'];
        $product->description = $_POST['description'];
        $product->price = (float)$_POST['price'];
        $product->origin = $_POST['origin'];
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
        return view('dashboard',compact('msg'));
    }

    public function update(Request $request){
        $product = Product::find((int)$request->id);
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = (float)$request->price;
            $product->origin = $request->origin;
            $product->save();
            foreach($request->file('images') as $file){
                $imagen = new Image();
                $name = $file->getClientOriginalName();
                $imagen->route = $file->storeAs('img', $name,'public');
                $imagen->product_id = $product->id;
                $imagen->save();
            }
            $msg = "Actualizado exitosamente";
            return view ('dashboard',compact('msg'));
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('updateProduct',compact('msg'));
        }
    }
}
