<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listes des notes</title>
</head>
<body>
    <a href="{{route("categories.index")}}">Liste categorie</a>
    <a href="{{route("notes.index")}}">Liste notes</a>
    <br>
    <h1>Listes des notes</h1>
    <a href="{{route('notes.create')}}">Ajouter une note</a>
    
    <br><br>
    <table border="1" style="border-collapse: collapse">
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        
        @foreach ($notes as $note )
         <tr> 
            <td>{{ _($note->id) }} </td>
            <td>{{ _($note->titre) }} </td>
            <td>{{ _($note->description) }} </td>
            <td>
                <a href="{{route('notes.edit', $note->id)}}">Modifier</a>
                <form action="{{route('notes.destroy', $note->id)}}" method="POST" style="display:inline">
                    @csrf
                    @method('delete')
                    <input type="submit" value="supprimer">
                </form>
            </td>
        </tr>   
        @endforeach
        
    </table>
</body>
</html>