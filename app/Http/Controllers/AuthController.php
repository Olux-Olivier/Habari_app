<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Redirection selon le type d'utilisateur
            if ($user->email == 'presseushindi@gmail.com') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('utilisateur.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }

    // Gérer la déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // L'enregistrement ---------------------------------------
    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function addUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fonction' => 'required',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fonction' => $request->fonction,
        ]);

        echo "utilisateur ajoute avec succes";
    }

    public function createAdmin(){

        $user = User::create([
            'name' => 'Presse Ushindi',
            'email' => 'presseushindi@gmail.com',
            'password' => Hash::make('presseushindi'),
            'fonction' => 'admin',
        ]);
        return to_route('login');
    }
}
