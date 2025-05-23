<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domaine;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(Request $request){
        $clients = Client::all();
        return view('ModuleClient.client.index', compact('clients'));
    }

    public function load(Request $request){
        $clients = Client::all();
        return view('ModuleClient.client.table', compact('clients'));
    }

    public function create(){
        $domaines = Domaine::pluck('name', 'id');
        return view('ModuleClient.client.create', compact('domaines'));
    }
    public function store(Request $request){
        $client = new client();
        $client->name=$request->input('name');
        $client->email=$request->input('email');
        $client->profession=$request->input('profession');
        $client->date_debut=$request->input('date_debut');
        $client->date_fin=$request->input('date_fin');
        $client->domaine_id=$request->input('domaine_id');
        $client->prenom=$request->input('prenom');
        $client->date_naissance=$request->input('date_naissance');
        $client->save();
        // $data = $request->only(['name', 'profession', 'date_debut','date_fin', 'domaine_id','prenom','date_naissance']);
        // $client = Client::create([
        //     'name' => $data['name'],
        //     'profession' => $data['profession'],
        //     'date_debut' => $data['date_debut'],
        //     'date_fin' => $data['date_fin'],
        //     'domaine_id' => $data['domaine_id'], // Assure-toi que ce champ est présent dans la requête
        //     'prenom' => $data['prenom'],
        //     'date_naissance' => $data['date_naissance'],
        // ]);
        if($client){
            $message = 'Client "' . $client['name'] . '" enregistré avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le client n'a pas été enregistré";
        }

        return response()->json(['message' => $message]);
    }

    public function show($id){
        $client = Client::find($id);
        return view('ModuleClient.client.show')->with('client', $client);
    }

    public function edit($id){
        $client = Client::findOrFail($id);
        $domaines = Domaine::pluck('name', 'id');
        return view('ModuleClient.client.edit', compact('client', 'domaines'));
       
    }
    public function update($id, Request $request){
        $client = Client::findOrFail($id);
        $client->name = $request->input('name');
        $client->profession = $request->input('profession');
        $client->email = $request->input('email');
        $client->date_debut = $request->input('date_debut');
        $client->date_fin = $request->input('date_fin');
        $client->domaine_id = $request->input('domaine_id');
        $client->prenom = $request->input('prenom');
        $client->date_naissance = $request->input('date_naissance');
        $client->save();
        if($client){
            $message = 'Client "' . $client['name'] . '" modifié avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le client n'a pas été modifié";
        }
       
        return response()->json(['message' => $message]);
    }

    public function delete($id){
        $client = Client::findOrFail($id);
        $client->delete();
        if($client){
            $message = 'client "' . $client['name'] . '" supprimé avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le client n'a pas été supprimé";
        }

        return response()->json(['message' => $message]);
    }


}
