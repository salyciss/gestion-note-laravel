<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une notes</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste notes</a>
    <a href="{{route("notes.index")}}">Liste notes</a>
    <br>
    <h1>Ajout d'une notes</h1>
    <a href="{{route('notes.create')}}">Ajouter une note</a>
    
    <form action="{{route("notes.update", $note->id)}}" method="post">
    @csrf
    @method('put')
    <br><br>

    <select name="id_categorie" id="categorie">
        @foreach ($categories as $categorie)
            @if ($categorie->id == $note->id_categorie)
                <option selected value="{{$categorie->id}}">{{$categorie->nom}}</option>
            @else
                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
            @endif
        @endforeach
    </select><br><br>


        <label for="titre">Titre</label>
        <input type="text"name="titre" value="{{ $note->titre }}"><br><br>
        
        <label for="description">Description</label>
        <input type="text"name="description" value="{{ $note->description }}"><br><br>

        <input type="submit" value="Modifier">
    </form>
</body>
</html>