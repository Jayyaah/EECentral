@extends('admin.layout')

@section('content')
    <h1>Articles</h1>

    @can('create', App\Models\Article::class)
        <a href="{{ route('admin.articles.create') }}">➕ Nouvel article</a>
    @endcan

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
                    @can('update', $article)
                        <a href="{{ route('admin.articles.edit', $article) }}">Modifierr️</a>
                    @endcan
                    @can('delete', $article)
                        <form action="{{ route('admin.articles.destroy', $article) }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Supprimer cet article ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    @endcan
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
