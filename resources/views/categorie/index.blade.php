<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des Categories</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste categorie</a>
    <a href="{{route("categories.create")}}">Ajouter categorie</a>
    <br>
    <h1>Listes des Categories</h1>
    <ul>

        @foreach ($categories as $categorie )
         <li> {{ _($categorie->nom) }}</li>   
        @endforeach
    </ul>
</body>
</html>