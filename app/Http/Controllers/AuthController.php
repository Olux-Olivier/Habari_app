<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        // Récupérer tous les utilisateurs sauf l'admin avec l'email spécifique
        $users = User::where('email', '!=', 'presseushindi@gmail.com')->get();

        // Retourner la vue avec la liste des utilisateurs
        return view('utilisateur.liste-utilisateur', compact('users'));
    }

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
            'commune' => 'required|string|max:255',
            'quartier' => 'required|string|max:255',
            'telephone' => 'required',
            'status_scolaire' => 'required',
            'etat_civil' => 'required|string|max:255',
            'nationalite' => 'required|string|max:255',
            'genre' => 'required',
            'dateNaissance' => 'required',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fonction' => $request->fonction,
            'commune' => $request->commune,
            'quartier' => $request->quartier,
            'telephone' => $request->telephone,
            'status_scolaire' => $request->status_scolaire,
            'etat_civil' => $request->etat_civil,
            'nationalite' => $request->nationalite,
            'genre' => $request->genre,
            'dateNaissance' => $request->dateNaissance,
        ]);

        if ($errors = $request->session()->get('errors')) {
            dd($errors->all());
        }

        if (!$user->save()) {
            dd('Erreur lors de l\'enregistrement !');
        }
        else{
            return to_route('user.index');
        }


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

    // details utilisateur
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('utilisateur.show', compact('user'));
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}
