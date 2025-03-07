<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Predication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PredicationController extends Controller
{
    // Liste des prédications
    public function index()
    {
        $predications = Predication::orderBy('created_at', 'desc')->get();
        return view('predication.index', compact('predications'));
    }

    // Formulaire predication
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une prédication.');
        }

        $users = User::whereIn('fonction', ['Évangéliste', 'Pasteur', 'Diacre/Diaconesse'])->get();
        return view('predication.create', compact('users'));
    }

    public function show($id)
    {
        $predication = Predication::findOrFail($id);
        return view('predication.show', compact('predication'));
    }


    // Ajouter une prédication
    public function store(Request $request)
    {
        $request->validate([
            'predicateur' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'categorie' => 'required|in:enseignement,exhortation,témoignage',
            'versets' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('predications', 'public');
        }

        $predication = Predication::create([
            'predicateur' => $request->predicateur,
            'titre' => $request->titre,
            'description' => $request->description,
            'categorie' => $request->categorie,
            'versets' => $request->versets,
            'photo' => $photoPath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('predication.index')->with('success', 'Prédication ajoutée avec succès !');
    }

    // Modifier une prédication
    public function update(Request $request, $id)
    {
        $predication = Predication::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'categorie' => 'required|in:enseignement,exhortation,témoignage',
            'versets' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        if ($request->hasFile('photo')) {
            if ($predication->photo) {
                Storage::disk('public')->delete($predication->photo);
            }
            $predication->photo = $request->file('photo')->store('predications', 'public');
        }

        $predication->update($request->except('photo'));

        return response()->json($predication);
    }

    // Supprimer une prédication
    public function destroy($id)
    {
        $predication = Predication::findOrFail($id);

        if ($predication->photo) {
            Storage::disk('public')->delete($predication->photo);
        }

        $predication->delete();

        return response()->json(['message' => 'Prédication supprimée avec succès']);
    }
}
