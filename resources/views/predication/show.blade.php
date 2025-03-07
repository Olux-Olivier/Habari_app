<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Prédication</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .predication-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .predication-details h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .predication-details p {
            font-size: 1rem;
            margin-bottom: 10px;
        }
        .predication-details .img-fluid {
            border-radius: 10px;
            max-width: 50%;  /* Réduit la taille de l'image à 50% */
            margin: 0 auto; /* Centre l'image */
            display: block;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- Retour Button -->
    <div class="mb-3">
        <a href="{{ url('/predication') }}" class="btn btn-outline-primary">Retour</a>
    </div>
    
    <!-- Détails Prédication -->
    <div class="predication-details mx-auto" style="max-width: 50%;"> <!-- Bloc réduit à 50% -->
        <h2>{{ $predication->categorie }}</h2>
        <span class="text-muted">Publiée le {{ $predication->created_at->format('d/m/Y H:i') }}</span><br>
        <p><strong>Prédicateur :</strong> {{ $predication->predicateur }}</p>
        <p><strong>Thème :</strong> {{ $predication->titre }}</p>
        <p><strong>Description :</strong> {{ $predication->description }}</p>
        <p><strong>Versets :</strong> {{ $predication->versets }}</p>
        
        <!-- Image de la Prédication -->
        <div class="text-center my-4">
            <img src="{{ asset('storage/' . $predication->photo) }}" alt="Image de la prédication" class="img-fluid rounded">
        </div>
    </div>
</div>

</body>
</html>






