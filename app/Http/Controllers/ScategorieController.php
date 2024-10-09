<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
           
            $scategories = Scategorie::with('categorie')->get();
            return response()->json($scategories);
        
    }catch(\Exception $e){
        return response()->json($e->getCode());
  }
}
    

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{
    $scategorie = new Scategorie([
    'nomscategorie' => $request->input('nomscategorie'),
    'imagescategorie' => $request->input('imagescategorie'),
    'categorieID' => $request->input('categorieID'),
    ]);
    $scategorie->save();
    return response()->json('S/Categorie créée !');
    }


    
    public function show($id)
    {
    $scategorie = Scategorie::with('categorie')->findOrFail($id);
    return response()->json($scategorie);
    }
    public function update(Request $request, $id)
    {
    $scategorie = Scategorie::find($id);
    $scategorie->update($request->all());
    return response()->json('S/Catégorie Modifié !');
    }
    public function destroy($id)
    {
    $scategorie = Scategorie::findOrFail($id);
    $scategorie->delete();
    return response()->json('Scategorie supprimée !');
    }
    
   
    
}
