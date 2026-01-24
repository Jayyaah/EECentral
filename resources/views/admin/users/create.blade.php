@extends('admin.layout')

@section('content')
    <h1>Créer un utilisateur</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div>
            <label>Nom</label><br>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" required>
        </div>

        <p>
            🔐 Un mot de passe temporaire sera généré et envoyé par email.
        </p>

        <div>
            <label>Rôle</label><br>
            <select name="role">
                <option value="editor">Editor</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit">Créer</button>
    </form>
@endsection
