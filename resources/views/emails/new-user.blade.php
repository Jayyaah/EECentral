<h1>Bienvenue sur EE Central</h1>

<p>Bonjour {{ $user->name }},</p>

<p>Un compte vient d’être créé pour vous.</p>

<p><strong>Identifiant :</strong> {{ $user->email }}</p>
<p><strong>Mot de passe temporaire :</strong> {{ $password }}</p>

<p>
    <a href="{{ url('/login') }}">
        👉 Se connecter
    </a>
</p>

<p>
    Pour des raisons de sécurité, merci de changer votre mot de passe après connexion.
</p>
