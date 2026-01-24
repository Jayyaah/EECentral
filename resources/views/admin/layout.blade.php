<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>
<body>
<nav>
    <a href="{{ route('admin.dashboard') }}">Admin</a> |
    <a href="{{ route('admin.articles.index') }}">Articles</a> |
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.users.index') }}">Utilisateurs</a> |
    @endif
    <a href="{{ route('admin.articles.create') }}">Nouveau</a>

    <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</nav>

<hr>
@if(session('success'))
    <div style="background:#d1fae5; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

@yield('content')
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
</body>
</html>
