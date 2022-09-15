<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_size;


class ProductSizeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    

    public function createSizing($idProd, $sizing=null, $stock=null, $stockXCH=null, $stockCH=null, $stockM=null,$stockG=null,$stockXG = null){
        $mSizes = "vTallas";
        $cero = 0;
        if (!$stockXCH && !$stockCH && !$stockM && !$stockG && !$stockXG) {
            $size = new Product_size();
            $size->product_id = $idProd;
            $size->size = $sizing;
            $size->stock = $stock;
            $size->save();
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
        
        // $msg = "Creado exitosamente";
        // return response()->json(["status"=>true,"msg"=>$msg,"id"=>$product->id]); 
        // return redirect('panelControl')->with('msg', $msg);
    }

    public function addSize($idProd, $size, $stock) {
        $newSize = new Product_size();
        $newSize->product_id = $idProd;
        $newSize->size = $size;
        $newSize->stock = $stock;
        $newSize->save();
    }

    public function deleteSize($idProd) {
        
    }
}
