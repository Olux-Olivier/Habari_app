<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 600px;
            margin: 50px auto;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
            
            <!-- Profil et Déconnexion -->
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" role="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->photo ?? 'https://via.placeholder.com/40' }}" alt="Profil" class="profile-img me-2">
                    <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">🚪 Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container dashboard-container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>Bienvenue, {{ auth()->user()->name ?? 'Admin' }}</h2>
            </div>
            <div class="card-body">
                <h4 class="text-center">Tâches Admin</h4>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><a href="#" class="text-decoration-none">📅 Publier un événement</a></li>
                    <li class="list-group-item"><a href="{{ url('/predication/create') }}" class="text-decoration-none">📖 Publier une prédication</a></li>
                    <li class="list-group-item"><a href="{{ url('/predication') }}" class="text-decoration-none">📜 Toutes les prédications</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>





