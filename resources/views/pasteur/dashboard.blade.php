<h1>Pasteur dashboard</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Déconnexion</button>
</form>
