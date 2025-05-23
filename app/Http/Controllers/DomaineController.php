<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domaine;

class DomaineController extends Controller
{
    public function index(Request $request){
        $domaines = Domaine::all();
        return view('ModuleClient.domaine.index', compact('domaines'));
    }

    public function load(Request $request){
        $domaines = Domaine::all();
        return view('ModuleClient.domaine.table', compact('domaines'));
    }

    public function create(){
        return view('ModuleClient.domaine.create');
    }
    public function store(Request $request){
        $domaine = new Domaine();
        $domaine->name=$request->input('name');
        $domaine->description=$request->input('description');
        $domaine->save();
        if($domaine){
            $message = 'Domaine de formation "' . $domaine['name'] . '" enregistré avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le domaine n'a pas été enregistré";
        }

        return response()->json(['message' => $message]);
    }

    public function show($id){
        $domaine = Domaine::find($id);
        return view('ModuleClient.domaine.show')->with('domaine', $domaine);
    }

    public function edit($id){
        $domaine = Domaine::findOrFail($id);
        return view('ModuleClient.domaine.edit')->with('domaine', $domaine);
       
    }
    public function update($id, Request $request){
        $domaine = Domaine::findOrFail($id);
        $domaine->name = $request->input('name');
        $domaine->description = $request->input('description');
        
        if($domaine){
            $message = 'Domaine de formation "' . $domaine['name'] . '" modifié avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le domaine n'a pas été modifié";
        }
        $domaine->save();
        return response()->json(['message' => $message]);
    }

    public function delete($id){
        $domaine = Domaine::findOrFail($id);
        $domaine->delete();
        if($domaine){
            $message = 'Domaine de formation "' . $domaine['name'] . '" supprimé avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le domaine n'a pas été supprimé";
        }

        return response()->json(['message' => $message]);
    }
}
