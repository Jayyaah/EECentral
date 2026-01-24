@extends('admin.layout')

@section('content')
    <h1>Dashboard admin</h1>

    @can('create', App\Models\Article::class)
        <a href="{{ route('admin.articles.create') }}">➕ Créer un article</a>
    @endcan

    <p>Total articles : {{ $totalArticles }}</p>
    <p>Publiés : {{ $publishedArticles }}</p>
    <p>Brouillons : {{ $draftArticles }}</p>

    <h2>Derniers articles</h2>
    <ul>
        @foreach($latestArticles as $article)
            <li>
                {{ $article->title }} ({{ $article->status }})
            </li>
        @endforeach
    </ul>
@endsection
