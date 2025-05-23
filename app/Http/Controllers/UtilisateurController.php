<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UtilisateurController extends Controller
{
    public function index(Request $request){
        $users = User::all();
        return view('ModuleUtilisateur.user.index', compact('users'));
    }

    public function load(Request $request){
        $users = User::all();
        return view('ModuleUtilisateur.user.table', compact('users'));
    }

    public function create(){
        $roles = Role::pluck('name', 'id');
        return view('ModuleUtilisateur.user.create', compact('roles'));
    }
    public function store(Request $request){
        // $user = new User();
        // $user->name=$request->input('name');
        // $user->description=$request->input('description');
        // $user->save();
        $data = $request->only(['name', 'email', 'password', 'role_id','prenom','date_naissance']);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), // Toujours hasher les mots de passe
            'role_id' => $data['role_id'], // Assure-toi que ce champ est présent dans la requête
            'prenom' => $data['prenom'],
            'date_naissance' => $data['date_naissance'],
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        if($user){
            $message = 'user "' . $user['name'] . '" enregistré avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le user n'a pas été enregistré";
        }

        return response()->json(['message' => $message]);
    }

    public function show($id){
        $user = User::find($id);
        return view('ModuleUtilisateur.user.show')->with('user', $user);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view('ModuleUtilisateur.user.edit', compact('user', 'roles'));
       
    }
    public function update($id, Request $request){
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->prenom = $request->input('prenom');
        $user->date_naissance = $request->input('date_naissance');
        $user->save();
        if($user){
            $message = 'user "' . $user['name'] . '" modifié avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le user n'a pas été modifié";
        }
       
        return response()->json(['message' => $message]);
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        if($user){
            $message = 'user "' . $user['name'] . '" supprimé avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le user n'a pas été supprimé";
        }

        return response()->json(['message' => $message]);
    }
}
