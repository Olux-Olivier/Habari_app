<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS (optionnel, pour les composants interactifs comme le modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Toutes les predications</title>
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Toutes les Prédications</h2>

    <div class="row">
        @foreach($predications as $predication)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg">
                    <img src="{{ asset('storage/' . $predication->photo) }}" class="card-img-top" alt="Image de la prédication" style="height: 200px; object-fit: cover;">

                    <div class="card-body">
                        <h5 class="card-title">{{ $predication->categorie }}</h5>
                        <span>Publiée le {{ $predication->created_at->format('d/m/Y H:i') }}</span><br><br>
                        <a href="{{ route('predication.show', $predication->id) }}" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ url('/predication/create') }}">Publier</a>
    <a href="{{route('admin.dashboard')}}">Dashboard</a>

    @if($predications->isEmpty())
        <p class="text-center text-muted">Aucune prédication disponible pour le moment.</p>
    @endif
</div>

</body>
</html>
