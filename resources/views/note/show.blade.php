<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails d'une note</title>
</head>
<body>
    <a href="{{ route('categories.index') }}">Liste catégories</a>
    <a href="{{ route('notes.index') }}">Liste notes</a>

    <h1>Détails d'une note</h1>

    <strong>Titre:</strong> {{ $note->titre }} <br>
    <strong>Description:</strong> {{ $note->description }} <br>
    <strong>Catégorie:</strong> {{ $note->categorie->nom }} <br><br>

    {{-- Affichage ou ajout de bannière --}}
    @if($note->banniere)
        <h3>Bannière associée :</h3>
        <strong>Titre :</strong> {{ $note->banniere->titre }} <br>
        <img src="{{ asset('storage/' . $note->banniere->image) }}" alt="Bannière" width="200"><br><br>

        {{-- Lien pour modifier ou supprimer --}}
        <a href="{{ route('bannieres.edit', $note->banniere->id) }}">Modifier la bannière</a>
        <form action="{{ route('bannieres.destroy', $note->banniere->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    @else
        <h3>Pas de bannière</h3>
        <form action="{{ route('bannieres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_note" value="{{ $note->id }}">
            <label for="titre">Titre bannière:</label>
            <input type="text" name="titre" required><br>
            <label for="image">Image:</label>
            <input type="file" name="image" required><br>
            <button type="submit">Ajouter</button>
        </form>
    @endif

</body>
</html>
