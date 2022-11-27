<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_size;
use App\Models\Product_category;
use App\Models\Category;
use App\Http\Controllers\ProductSizeController;


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
        $product->price = floatval($request->price);
        $product->origin = $request->origin;
        if (isset($request->stock)){
            $product->stock = $request->stock;
        } else {
            $stock = $request->stockXCH + $request->stockCH + $request->stockM + $request->stockG + $request->stockXG;
            $product->stock = $stock;
        }
        
        $product->originDescription = $request->aboutOrigin;
        $product->save();

        foreach ($categories as $c) {
            if(isset($_POST["categorie".$c->id])){
                $new_c = new Product_category();
                $new_c->product_id = $product->id;
                $new_c->category_id = $c->id;
                $new_c->save();
            }
        }
        $uni = "Unitalla";
        $mSizes = "vTallas";
        $createSizes = new ProductSizeController();
        if($request->sizing == $uni) {
            $createSizes->createSizing($product->id, $request->sizing, $product->stock);
        } 
        if($request->sizing == $mSizes){
            $createSizes->createSizing($product->id, $request->sizing, $product->stock, $request->stockXCH, $request->stockCH, $request->stockM, $request->stockG, $request->stockXG);
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
            $photo = $img->store('public/products/' . $id);
            $imagen->route = Storage::url($photo);
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
        $uni = "Unitalla";
        $mSizes = "vTallas";
        //si encuentra el producto mandando por medio del id, crea un nuevo producto
        if($product && $product->status === 1){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = (float)$request->price;
            $product->origin = $request->origin;
            if($request->sizing == $uni) {
                $product->stock = $request->stock;
            } elseif ($request->sizing ==$mSizes) {
                $stock = $request->stockXCH + $request->stockCH + $request->stockM + $request->stockG + $request->stockXG;
                $product->stock = $stock;
            }
            
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
            if($request->sizing){
                $this->deleteProdSizes($request->id);
                if($request->sizing == $uni) {
                    $this->createSizes($request->id, $request->sizing, $product->stock);
                } elseif ($request->sizing ==$mSizes) {
                //     dd($request->sizing);
                    $this->createSizes($request->id, $request->sizing, $product->stock, $request->stockXCH, $request->stockCH, $request->stockM, $request->stockG, $request->stockXG);
                }
            }
            if($categories){
                $this->deleteProdCategory($request->id);
                foreach ($categories as $c) {
                    if(isset($_POST["categorie".$c->id])){
                        $new_c = new Product_category();
                        $new_c->product_id = $product->id;
                        $new_c->category_id = $c->id;
                        $new_c->save();
                    }
                }
            }
            // Category::where('product_id', $product->id)->delete();
            
            $msg = "Creado exitosamente";
            
        $request->session()->flash('message', 'Producto guardado exitosamente');
        $request->session()->flash('message-type', 'success');
            return response()->json(["status"=>true,"msg"=>$msg,"id"=>$product->id]); 
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('updateProduct', compact('msg'));
        }
    }

    public function createSizes($idProd, $sizing, $stock, $stockXCH=null, $stockCH=null, $stockM=null,$stockG=null,$stockXG = null) {
        $mSizes = "vTallas";
        $uni = "Unitalla";
        $cero = 0;
        if (!$stockXCH && !$stockCH && !$stockM && !$stockG && !$stockXG) {
            $this->addSize($idProd, $uni, $stock);
        } elseif($sizing == $mSizes) {
            if($stockXCH > $cero) {
                $XCH = "XCH";
                $this->addSize($idProd, $XCH, $stockXCH);
            }
            if ($stockCH > $cero) {
                $CH = "CH";
                $this->addSize($idProd, $CH, $stockCH);
            }
            if ($stockM > $cero) {
                $M = "M";
                $this->addSize($idProd, $M, $stockM);
            }
            if ($stockG > $cero) {
                $G = "G";
                $this->addSize($idProd, $G, $stockG);
            }
            if ($stockXG > $cero) {
                $XG = "XG";
                $this->addSize($idProd, $XG, $stockXG);
            }
        }
    }

    public function addSize($idProd, $size, $stock) {
        $newSize = new Product_size();
        $newSize->product_id = $idProd;
        $newSize->size = $size;
        $newSize->stock = $stock;
        $newSize->save();
    }

    public function deleteProdCategory($id) {
        Product_category::where('product_id', $id)->delete();
    }

    public function deleteProdSizes($id) {
        Product_size::where('product_id', $id)->delete();
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
        try{
            $product = Product::where('status',1)->orderBy('name')->paginate(15);
            foreach($product as $p){
                $p->imagenes;
            }
            return view('manageProducts', compact('product'));
        }catch (\Throwable$th) {
            return $th->getMessage();
        }
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
