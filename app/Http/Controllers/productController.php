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

        $categories = Category::where('status',1)->get();
        

        $product = New Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->origin = $request->origin;
        $product->stock = $request->stock;
        $product->originDescription = $request->aboutOrigin;
        $product->save();

        // foreach($request->file('images') as $file){
        //     $imagen = new Image();
        //     $name = $file->getClientOriginalName();
        //     $dest = 'assets/img';
        //     $file->move($dest,$name);
        //     $r = 'img';
        //     $imagen->route = $r.'/'.$name;
        //     $imagen->product_id = $product->id;
        //     $imagen->save();
        // }

        foreach ($categories as $c) {
            if(isset($_POST["categorie".$c->id])){
                $new_c = new Product_category();
                $new_c->product_id = $product->id;
                $new_c->category_id = $c->id;
                $new_c->save();
            }
        }

        $msg = "Creado exitosamente";
        return response()->json(["status"=>true,"msg"=>$msg,"id"=>$product->id]); 
        // return redirect('panelControl')->with('msg', $msg);
    }

    public function subeImagenes(Request $request, $id)
    {
        // dd($request);
        $count = 0;
        $files = $request->file('file');
        foreach($files as $img){
            $imagen = new Image();
            $name = $img->getClientOriginalName();
            $dest = 'assets/img';
            $img->move($dest,$name);
            $r = 'img';
            $imagen->route = $r.'/'.$name;
            $imagen->product_id = $id;
            $imagen->save();
        }
        // return response()->json(["status"=>true,"msg"=>$msg,"id"=>$id]); 
        $request->session()->flash('message', 'Producto guardado exitosamente');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'Hooray']);
    }
    public function eliminaFoto(Request $request, $id)
    {
        $imagen = Image::findOrFail($id);
        $imagen->delete();
        $request->session()->flash('message', 'Imagen eliminada exitosamente');
        $request->session()->flash('message-type', 'success');

        return response()->json(['status'=>'Hooray']);
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
            $product->originDescription = $request->aboutOrigin;
            $product->save();
            //si se mandan imagenes, las sobreescribe
            // if($request->file('images')) Image::where('product_id', $product->id)->delete();
            // if ($request->has(['images'])) {
            //     foreach($request->file('images') as $file){
            //         $imagen = new Image();
            //         $name = $file->getClientOriginalName();
            //         $imagen->route = $file->storeAs('img', $name,'public');
            //         $imagen->product_id = $product->id;
            //         $imagen->save();
            //     }
            // }
            // Category::where('product_id', $product->id)->delete();
            foreach ($categories as $c) {
                if(isset($_POST["categorie".$c->id])){
                    $new_c = new Product_category();
                    $new_c->product_id = $product->id;
                    $new_c->category_id = $c->id;
                    $new_c->save();
                }
            }
            $msg = "Creado exitosamente";
            return response()->json(["status"=>true,"msg"=>$msg,"id"=>$product->id]); 
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('updateProduct', compact('msg'));
        }
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $product->status = 0;
        $product->save();
        
        if($product){
            $i = Image::where('product_id',$request->id)->get();
            $ps = Product_size::where('product_id',$request->id)->get();
            $pc = Product_category::where('product_id',$request->id)->get();
            foreach($pc as $p_c){
                $p_c->status = 0;
                $p_c->save();
            }
            $msg = "Eliminado exitosamente";

            $product = Product::orderBy('name')->where('status',1)->paginate(15);
                foreach($product as $p){
                    $p->imagenes;
                }
                $request->session()->flash('message', 'Producto eliminado exitosamente');
                $request->session()->flash('message-type', 'success');
                return redirect('administrarProductos');
        }
        else{
            $msg = "No se pudo eliminar";
            return view ('deleteProduct',compact('msg'));
        }
    }

    public function manageProductsScreen()
    {
        $product = Product::orderBy('name')->where('status',1)->paginate(15);
        foreach($product as $p){
            $p->imagenes;
        }
        return view('manageProducts', compact('product'));
    }

    

    public function viewProductsEdit($id)
    {
        
        $p = Product::findOrFail($id);
        $p->imagenes;
        $categories = Category::where('status',1)->get();
        $cat = Product_category::where('product_id', $p->id)->get();
        return view('editProduct',compact('categories','cat'))->with('p', $p);
    }
}
