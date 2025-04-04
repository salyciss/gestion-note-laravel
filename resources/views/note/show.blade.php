<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details d'une note</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste notes</a>
    <a href="{{route("notes.index")}}">Liste notes</a>
    <br>
    <h1>Details d'une note</h1>

        <strong>Titre:</strong> {{ $note->titre }}
        
        
        <strong>Description:</strong> {{ $note->description }}
        
        
        <strong>Categorie:</strong> {{ $note->categorie->nom }}


    </form>
</body>
</html>