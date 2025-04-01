<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
            display: block;
            margin: 0 auto;
        }
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <div class="text-center">
            <img src="{{ $user->photo ?? 'default-profile.png' }}" alt="Photo de profil" class="profile-pic">
            <h2 class="mt-3">{{ $user->name }}</h2>
            <p class="text-muted">{{ $user->fonction ?? 'Aucun' }}</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="info-box"><strong>Email:</strong> {{ $user->email }}</div>
                <div class="info-box"><strong>Genre:</strong> {{ $user->genre }}</div>
                <div class="info-box"><strong>Commune:</strong> {{ $user->commune }}</div>
            </div>
            <div class="col-md-4">
                <div class="info-box"><strong>Quartier:</strong> {{ $user->quartier }}</div>
                <div class="info-box"><strong>Téléphone:</strong> {{ $user->telephone }}</div>
                <div class="info-box"><strong>Nationalité:</strong> {{ $user->nationalite }}</div>
            </div>
            <div class="col-md-4">
                <div class="info-box"><strong>État civil:</strong> {{ $user->etat_civil }}</div>
                <div class="info-box"><strong>Statut scolaire:</strong> {{ $user->statut_scolaire }}</div>
                <div class="info-box"><strong>Date de naissance:</strong> {{ $user->dateNaissance }}</div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user.index')}}" class="btn btn-secondary">Retour</a>
            <a href="#" class="btn btn-primary">Modifier</a>
            <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
