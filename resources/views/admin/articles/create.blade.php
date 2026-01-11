@extends('admin.layout')

@section('content')
    <h1>Créer un article</h1>

    <form method="POST" action="{{ route('admin.articles.store') }}">
        @csrf

        <div>
            <label>Titre</label><br>
            <input type="text" name="title" required>
        </div>

        <div>
            <label>Contenu</label><br>
            <textarea name="content" rows="5" required></textarea>
        </div>

        <div>
            <label>Jeu</label><br>
            <input type="text" name="game" placeholder="BO1, BO2, BO3…" required>
        </div>

        <div>
            <label>Carte</label><br>
            <input type="text" name="map" placeholder="Origins, Der Riese…" required>
        </div>

        <div>
            <label>Statut</label><br>
            <select name="status">
                <option value="draft">Brouillon</option>
                <option value="published">Publié</option>
            </select>
        </div>

        <button type="submit">Enregistrer</button>
    </form>
@endsection
