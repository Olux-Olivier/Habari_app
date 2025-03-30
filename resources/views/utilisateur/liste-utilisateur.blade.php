<!DOCTYPE html>
<html lang="en">
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
                        <th>Email</th>
                        <th>Type</th>
                        <th>Fonction</th>
                        <th>Commune</th>
                        <th>Quartier</th>
                        <th>Date de Naissance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type == 1 ? 'Admin' : ($user->type == 2 ? 'Pasteur' : 'Fidèle') }}</td>
                            <td>{{ $user->fonction ?? 'Aucun' }}</td>
                            <td>{{ $user->commune }}</td>
                            <td>{{ $user->quartier }}</td>
                            <td>{{ $user->dateNaissance }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">
                                    ✏ Modifier
                                </a>
                                <form action="#" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑 Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('addUser')}}">Ajouter compte</a>
            <a href="{{route('admin.dashboard')}}">Dashboard</a>
        </div>

    </div>
    @if($users->isEmpty())
        <p class="text-center text-muted">Aucun utilisateur disponible.</p>
    @endif
</div>
</body>
</html>
