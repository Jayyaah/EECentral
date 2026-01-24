<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>
<body>
<nav>
    <a href="{{ route('admin.articles.index') }}">Articles</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Déconnexion</button>
    </form>
</nav>

<hr>
@if(session('success'))
    <div style="background:#d1fae5; padding:10px; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

@yield('content')
</body>
</html>
