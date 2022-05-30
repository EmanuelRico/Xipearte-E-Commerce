<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_category;

class CategoryController extends Controller
{
    //Agregar categoria
    public function saveCategory(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->categoryName;
        $cat->description = $request->categoryDescription;
        $cat->save();
        return redirect('/panelControl');
    }

    //pantalla para agregar categoria
    public function pantallaNuevaCategoria()
    {
        return view('addCategory');
    }
    //pantalla administrador para Ver todas las categorias y editarlas
    public function manageCategoriesScreen()
    {
        $category = Category::orderBy('name')->get();
        return view('manageCategories', compact('category'));
    }

    //Pantalla para editar la categoria
    public function viewCategoryEdit($id)
    {
        $c = Category::find($id);

        return view('editCategory', compact('c'));
    }

    //Actualizar categoria
    public function update(Request $request){
        $c = Category::find((int)$request->id);
        if($c){
            $c->name = $request->name;
            $c->description = $request->description;
            $c->save();
            $msg = "Actualizado exitosamente";
            return redirect('administrarCategorias')->with('msg', $msg);
        }
        else{
            $msg = "No se pudo actualizar";
            return view ('editCategory', compact('msg'));
        }
    }

    //Eliminar categoria
    public function delete(Request $request){
        //cambiar la variable show a falso, solo se muestran las categorias con show = true
        $category = Category::find((int)$request->id);
        
        if($category){
            Product_category::where('category_id', (int)$request->id)->delete();
            $category->delete();
            $msg = "Eliminado exitosamente";

            return redirect('panelControl')->with('msg', $msg);
        }
        else{
            $msg = "No se pudo eliminar";
            return view ('deleteCategory',compact('msg'));
        }
    }
}
