<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function saveCategory(Request $request)
    {
        
        $cat = new Category();
        $cat->name = $request->categoryName;
        $cat->description = $request->categoryDescription;
        $cat->save();
        return redirect('/panelControl');

    }

    public function pantallaNuevaCategoria()
    {
        return view('addCategory');
    }
}
