<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Connexion</title>
</head>
<body>

<div class="container d-flex justify-content-center mt-5">
    <div class="card shadow-lg" style="width: 40%;">
        <div class="card-header bg-primary text-white text-center">
            <h4>Connexion</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
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

                <!-- Bouton -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>