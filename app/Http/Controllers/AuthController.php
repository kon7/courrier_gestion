<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function getUsers()
{
    try {
        $users = User::select('id', 'name','email','prenom')->get(); // Récupérer seulement les champs nécessaires
        return response()->json($users, 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erreur lors de la récupération des utilisateurs'], 500);
    }
}


    public function register(Request $request)
    {
    
        $data = $request->only(['name', 'email', 'password', 'role_id']);

    // Créer l'utilisateur
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']), // Toujours hasher les mots de passe
        'role_id' => $data['role_id'], // Assure-toi que ce champ est présent dans la requête
    ]);
        Log::info('Register endpoint hit', $request->all());
        // return response()->json($user, 201);
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

public function login(Request $request)
{
    // Valide les données entrantes
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Tente l'authentification
    if (!auth()->attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Récupère l'utilisateur connecté
    $user = auth()->user();

    // Génère un token pour Sanctum
    $token = $user->createToken('auth_token')->plainTextToken;

    // Retourne l'utilisateur et le token
    return response()->json([
        'user' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}
public function profile(Request $request)
{
    // Récupérer l'utilisateur connecté
    $user = $request->user();

    // Retourner les informations de l'utilisateur
    return response()->json([
        'id' => $user->id,
        'name' => $user->name,
        'prenom' => $user->prenom,
        'email' => $user->email,
        'role_id' => $user->role_id,
        'created_at' => $user->created_at,
        'updated_at' => $user->updated_at,
    ]);
}
public function showUserManagement()
{
    return view('ModuleUtilisateur.users');
}





public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out successfully']);
}


/// -------------------------------- Administration --------------------------------

 // Afficher le formulaire de connexion
 public function showLoginForm()
 {
     return view('auth.login');
 }

 // Gérer la connexion
 public function loginadmin(Request $request)
 {
     $credentials = $request->validate([
         'email' => 'required|email',
         'password' => 'required',
     ]);

     if (auth()->attempt($credentials)) {
         $request->session()->regenerate();
          $user = auth()->user()->role_id;
         // Redirige vers la page admin si l'utilisateur est admin
         if ($user == 1) {
             return redirect()->intended(route('home'));
         }

         return redirect('/');
     }

     return back()->withErrors([
         'email' => 'Les identifiants sont incorrects.',
     ])->onlyInput('email');
 }

 // Gérer la déconnexion
 public function logoutadmin(Request $request)
 {
     Auth::logout();

     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect('/login');
 }

}
