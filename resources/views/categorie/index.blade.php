<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des categories</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste categorie</a>
    <a href="{{route("notes.index")}}">Liste notes</a>
    <br>
    <h1>Listes des Categories</h1>

    <a href="{{route('categories.create')}}">Ajouter une categorie</a>
    <ul>

        @foreach ($categories as $categorie )
         <li> 
            {{ _($categorie->nom) }} 
            <a href="{{route('categories.edit', $categorie->id)}}">Modifier</a>
            <form action="{{route('categories.destroy', $categorie->id)}}" method="POST" style="display:inline">
                @csrf
                @method('delete')
                <input type="submit" value="supprimer">
            </form>
        </li>   
        @endforeach
    </ul>
</body>
</html>