@extends('admin.layout')

@section('content')
    <h1>Utilisateurs</h1>

    <a href="{{ route('admin.users.create') }}">➕ Nouvel utilisateur</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Créé le</th>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </table>
@endsection
