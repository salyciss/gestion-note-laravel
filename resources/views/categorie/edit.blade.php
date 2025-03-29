<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une categorie</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste categorie</a>
    <a href="{{route("categories.create")}}">Ajouter categorie</a>
    <br>
    <h1>Ajout d'une Categorie</h1>
    
    <form action="{{route("categories.update", $categorie->id)}}" method="post">
    @csrf
    @method('put')
        
        <label for="nom">Nom</label>
        <input type="text"name="nom" value="{{ $categorie->nom }}"><br><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>