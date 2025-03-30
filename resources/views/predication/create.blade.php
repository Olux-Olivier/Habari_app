<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter predication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg" style="width: 40%;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Ajouter une Prédication</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="/predication" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                <div class="mb-3">
                    <label for="predicateur" class="form-label">Prédicateur</label>
                    <select class="form-select" id="predicateur" name="predicateur">
                        <option value="">Sélectionner un prédicateur</option>
                        @foreach($users as $user)
                            @if($user->fonction != 'Aucun')
                                <option value="{{ $user->name }}">{{ $user->name }} ({{ $user->fonction }})</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <!-- Titre -->
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre(thème)</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                </div>

                <!-- Catégorie -->
                <div class="mb-3">
                    <label for="categorie" class="form-label">Catégorie</label>
                    <select class="form-select" id="categorie" name="categorie" required>
                        <option value="enseignement">Enseignement</option>
                        <option value="exhortation">Exhortation</option>
                        <option value="témoignage">Témoignage</option>
                    </select>
                </div>

                <!-- Versets bibliques -->
                <div class="mb-3">
                    <label for="versets" class="form-label">Versets bibliques (optionnel)</label>
                    <input type="text" class="form-control" id="versets" name="versets" placeholder="Ex: Jean 3:16, Matthieu 5:9">
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>

                <!-- Bouton d'envoi -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Enregistrer la prédication
                    </button>
                    <a href="#" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
