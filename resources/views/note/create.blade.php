<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'une note</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste categorie</a>
    <a href="{{route("notes.index")}}">Liste notes</a>
    <br>
    <h1>Ajout d'une note</h1>
    <a href="{{route('notes.create')}}">Ajouter une note</a>
    
    <br><br>
    <form action="{{route("notes.store")}}" method="post">
    @csrf

    <select name="id_categorie" id="categorie">
        <option value="">Selectionner une categorie</option>
        @foreach ($categories as $categorie)
        <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
        @endforeach
    </select>
    <br><br>
        <label for="titre">Titre</label>
        <input type="text"name="titre"><br><br>
        
        <label for="description">description</label>
        <input type="text"name="description"><br><br>

        <input type="submit" value="Creer">
    </form>
</body>
</html>