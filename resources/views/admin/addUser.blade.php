<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajout d'un Utilisateur</title>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <div class="card-header bg-primary text-white text-center">
            <h4>Ajout d'un utilisateur</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('addUser') }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                <div class="row g-3">
                    <!-- Nom -->
                    <div class="col-md-4">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Fonction -->
                    <div class="col-md-4">
                        <label for="fonction" class="form-label">Fonction</label>
                        <select class="form-select" id="fonction" name="fonction">
                            <option value="Aucun">Fidèle</option>
                            <option value="Évangéliste">Évangéliste</option>
                            <option value="Pasteur">Pasteur</option>
                            <option value="Diacre">Diacre/Diaconesse</option>
                        </select>
                    </div>

                    <!-- Commune -->
                    <div class="col-md-4">
                        <label for="commune" class="form-label">Commune</label>
                        <select class="form-select" id="commune" name="commune">
                            <option value="kenya">Kenya</option>
                            <option value="katuba">Katuba</option>
                            <option value="annexe">Annexe</option>
                            <option value="ruashi">Ruashi</option>
                            <option value="kamalondo">Kamalondo</option>
                        </select>
                    </div>

                    <!-- Quartier -->
                    <div class="col-md-4">
                        <label for="quartier" class="form-label">Quartier</label>
                        <input type="text" class="form-control" id="quartier" name="quartier" required>
                    </div>

                    <!-- Téléphone -->
                    <div class="col-md-4">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                    </div>

                    <!-- Genre -->
                    <div class="col-md-4">
                        <label class="form-label">Genre</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="homme" value="Homme">
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="femme" value="Femme">
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                    </div>

                    <!-- Date de naissance -->
                    <div class="col-md-4">
                        <label for="dateNaissance" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
                    </div>

                    <!-- Statut scolaire -->
                    <div class="col-md-4">
                        <label for="statutScolaire" class="form-label">Statut scolaire</label>
                        <select class="form-select" id="statutScolaire" name="status_scolaire">
                            <option value="Élève">Élève</option>
                            <option value="Étudiant">Étudiant</option>
                            <option value="Travailleur">Travailleur</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>

                    <!-- État civil -->
                    <div class="col-md-4">
                        <label for="etatCivil" class="form-label">État civil</label>
                        <select class="form-select" id="etatCivil" name="etat_civil">
                            <option value="Célibataire">Célibataire</option>
                            <option value="Marié(e)">Marié(e)</option>
                            <option value="Divorcé(e)">Divorcé(e)</option>
                            <option value="Veuf(ve)">Veuf(ve)</option>
                        </select>
                    </div>

                    <!-- Nationalité -->
                    <div class="col-md-4">
                        <label for="nationalite" class="form-label">Nationalité</label>
                        <input type="text" class="form-control" id="nationalite" name="nationalite" required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="col-md-4">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="col-md-4">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
