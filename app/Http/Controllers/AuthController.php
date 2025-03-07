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
            if ($user->type == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->type == 2) {
                return redirect()->route('pasteur.dashboard');
            } else {
                return redirect()->route('fidele.dashboard');
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

    // Gérer l'inscription
    public function register(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'nullable|in:1,2,3', // Type optionnel, valeurs autorisées : 1, 2, 3
            'fonction' => 'required|in:Évangéliste, Pasteur, Diacre, Aucun',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type ?? 3, // Par défaut, Fidèle (3) si non spécifié
            'fonction' => $request->fonction,
        ]);


        // Connexion automatique après inscription
        Auth::login($user);

        // Redirection selon le rôle
        if ($user->type == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->type == 2) {
            return redirect()->route('pasteur.dashboard');
        } else {
            return redirect()->route('fidele.dashboard');
        }
    }

}
