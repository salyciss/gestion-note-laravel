<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la bannière</title>
</head>
<body>

    <a href="{{ route('notes.show', $banniere->id_note) }}">Retour à la note</a>
    <br><br>

    <h1>Modifier la bannière</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bannieres.update', $banniere->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="titre">Titre de la bannière :</label><br>
            <input type="text" name="titre" value="{{ old('titre', $banniere->titre) }}" required>
        </div>

        <div>
            <label>Image actuelle :</label><br>
            <img src="{{ asset('storage/' . $banniere->image) }}" alt="Bannière" width="200"><br><br>
        </div>

        <div>
            <label for="image">Nouvelle image (optionnel) :</label><br>
            <input type="file" name="image">
        </div>

        <br>
        <button type="submit">Mettre à jour</button>
    </form>

</body>
</html>
