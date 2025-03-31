<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg w-75">
        <div class="card-header bg-primary text-white text-center">
            <h4>Ajout d'un utilisateur</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('addUser') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Nom -->
                    <div class="mb-3 col-md-4">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 col-md-4">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Fonction -->
                    <div class="mb-3 col-md-4">
                        <label for="fonction" class="form-label">Fonction</label>
                        <select class="form-select" id="fonction" name="fonction">
                            <option value="Aucun">Fidèle</option>
                            <option value="Évangéliste">Évangéliste</option>
                            <option value="Pasteur">Pasteur</option>
                            <option value="Diacre">Diacre/Diaconesse</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Commune -->
                    <div class="mb-3 col-md-4">
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
                    <div class="mb-3 col-md-4">
                        <label for="quartier" class="form-label">Quartier</label>
                        <input type="text" class="form-control" id="quartier" name="quartier" required>
                    </div>

                    <!-- Genre avec boutons radio -->
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Genre</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="homme" name="genre" value="M">
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="femme" name="genre" value="F">
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Date de naissance -->
                    <div class="mb-3 col-md-4">
                        <label for="dateNaissance" class="form-label">Date Naissance</label>
                        <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" required>
                    </div>

                    <!-- Mot de passe -->
                    <div class="mb-3 col-md-4">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="mb-3 col-md-4">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
