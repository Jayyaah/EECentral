@extends('admin.layout')

@section('content')
    <h1>Modifier l’article</h1>

    @if($errors->any())
        <div style="background:#fee2e2; padding:10px; margin-bottom:10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.articles.update', $article) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Titre</label><br>
            <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
        </div>

        <div>
            <label>Contenu</label><br>
            <textarea name="content" rows="5" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div>
            <label>Jeu</label><br>
            <input type="text" name="game" value="{{ old('game', $article->game) }}" required>
        </div>

        <div>
            <label>Carte</label><br>
            <input type="text" name="map" value="{{ old('map', $article->map) }}" required>
        </div>

        <div>
            <label>Statut</label><br>
            <select name="status">
                <option value="draft" @selected($article->status === 'draft')>Brouillon</option>
                <option value="published" @selected($article->status === 'published')>Publié</option>
            </select>
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
