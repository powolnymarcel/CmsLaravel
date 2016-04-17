<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class CategorieController extends Controller
{
   public function getCategorieIndex(){
       $categories = Categories::orderBy('created_at','desc')->paginate(5);
       return view('admin.blog.categories',['categories'=>$categories]);
   }



    public function postCreationCategorie(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required|unique:categories'
        ]);
        $categorie = new Categories();
        $categorie->nom=$request['nom'];
        if ($categorie->save()){
            return Response::json(['message'=>'Categorie cree'],200);

        }
        return Response::json(['message'=>'Erreur lors de la création'],404);

    }

    public function postUpdateCategorie(Request $request)

    {
        $this->validate($request,[
            'nom'=>'required|unique:categories'
        ]);

        $categorie=Categories::find($request['categorieID']);
        if (!$categorie){
            return Response::json(['message'=>"Categorie non trouvee",404]            );
        }
        $categorie->nom=$request['nom'];
        $categorie->update();
        return Response::json(['message'=>'Catetgorie mise à jour','nouveau_nom'=>$request['nom']],200);
    }


    public function getDeleteCategorie($categorie_id){
        $categorie=Categories::find($categorie_id);
        $categorie->delete();
        return Response::json(['message'=>'categorie supprimee']);
    }
}
