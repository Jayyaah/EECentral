@extends('admin.layout')

@section('content')
    <h1>Articles</h1>

    <a href="{{ route('admin.articles.create') }}">
        ➕ Nouvel article
    </a>

    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>Titre</th>
            <th>Jeu</th>
            <th>Carte</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->game }}</td>
                <td>{{ $article->map }}</td>
                <td>{{ $article->status }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article) }}">✏️</a>
                    <form action="{{ route('admin.articles.destroy', $article) }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">🗑</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Aucun article</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
