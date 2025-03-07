
<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg" style="width: 40%;">
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
            <form method="POST" action="{{ route('addUser') }}" enctype="multipart/form-data" >
                @csrf

                <!-- Nom -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Confirmer le mot de passe -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <!-- Type d'utilisateur (Optionnel) -->
                <div class="mb-3">
                    <label for="type" class="form-label">Type d'utilisateur (optionnel)</label>
                    <select class="form-select" id="type" name="type">
                        <option value="">Sélectionner un rôle (facultatif)</option>
                        <option value="1">Admin</option>
                        <option value="2">Pasteur</option>
                        <option value="3">Fidèle</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fonction" class="form-label">Fonction</label>
                    <select class="form-select" id="fonction" name="fonction">
                        <option value="Aucun">Aucun</option>
                        <option value="Évangéliste">Évangéliste</option>
                        <option value="Pasteur">Pasteur</option>
                        <option value="Diacre">Diacre/Diaconesse</option>
                    </select>
                </div>

                <!-- Bouton -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>

