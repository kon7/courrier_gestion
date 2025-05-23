<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request){
        $roles = Role::all();
        return view('ModuleUtilisateur.role.index', compact('roles'));
    }

    public function load(Request $request){
        $roles = Role::all();
        return view('ModuleUtilisateur.role.table', compact('roles'));
    }

    public function create(){
        return view('ModuleUtilisateur.role.create');
    }
    public function store(Request $request){
        $role = new Role();
        $role->name=$request->input('name');
        $role->description=$request->input('description');
        $role->save();
        if($role){
            $message = 'Role "' . $role['name'] . '" enregistré avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le role n'a pas été enregistré";
        }

        return response()->json(['message' => $message]);
    }

    public function show($id){
        $role = Role::find($id);
        return view('ModuleUtilisateur.role.show')->with('role', $role);
    }

    public function edit($id){
        $role = Role::findOrFail($id);
        return view('ModuleUtilisateur.role.edit')->with('role', $role);
       
    }
    public function update($id, Request $request){
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        
        if($role){
            $message = 'Role "' . $role['name'] . '" modifié avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le role n'a pas été modifié";
        }
        $role->save();
        return response()->json(['message' => $message]);
    }

    public function delete($id){
        $role = Role::findOrFail($id);
        $role->delete();
        if($role){
            $message = 'Role "' . $role['name'] . '" supprimé avec succès.';
        } else{
            $message = "Une erreur est survenue lors de l'enregistrement. Le role n'a pas été supprimé";
        }

        return response()->json(['message' => $message]);
    }
}
