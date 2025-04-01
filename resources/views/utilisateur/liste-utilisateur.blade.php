<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS (optionnel, pour les composants interactifs comme le modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Liste Utilisateurs</title>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4 text-center">Liste des Utilisateurs</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Fonction</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->fonction ?? 'Aucun' }}</td>
                            <td>{{ $user->genre ?? '-' }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">
                                    👁 Voir plus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('addUser') }}" class="btn btn-success mt-3">Ajouter un compte</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Dashboard</a>
        </div>
    </div>

    @if($users->isEmpty())
        <p class="text-center text-muted">Aucun utilisateur disponible.</p>
    @endif
</div>

</body>
</html>
