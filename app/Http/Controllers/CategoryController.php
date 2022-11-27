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
        $request->session()->flash('message', 'Categoría creada exitosamente');
        $request->session()->flash('message-type', 'success');

        $msg = "Creado exitosamente";
        return response()->json(["status"=>true,"msg"=>$msg,"id"=>$cat->id]); 
        //return redirect("editarCategoria/".$cat->id);
    }

    //pantalla para agregar categoria
    public function pantallaNuevaCategoria()
    {
        return view('addCategory');
    }
    //pantalla administrador para Ver todas las categorias y editarlas
    public function manageCategoriesScreen()
    {
        $category = Category::where('status',1)->orderBy('name')->paginate(15);
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
        if($c && $c->status === 1){
            $c->name = $request->name;
            $c->description = $request->description;
            $c->save();
            $msg = "Actualizado exitosamente";
            $request->session()->flash('message', 'Categoría actualizada exitosamente');
            $request->session()->flash('message-type', 'success');
            return response()->json(["status"=>true,"msg"=>$msg,"id"=>$c->id]);
            //return redirect("editarCategoria/".$c->id);
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
        $category->status = 0;
        $category->save();
        
        if($category){
            $pc = Product_category::where('category_id', (int)$request->id)->get();
            foreach($pc as $p){
                $p->status = 0;
                $p->save();
            }
            $msg = "Eliminado exitosamente";
            $category = Category::where('status',1)->orderBy('name')->paginate(15);
            $request->session()->flash('message', 'Categoría eliminada exitosamente');
            $request->session()->flash('message-type', 'success');
            return redirect("administrarCategorias");
        }
        else{
            $msg = "No se pudo eliminar";
            return view ('deleteCategory',compact('msg'));
        }
    }
}
