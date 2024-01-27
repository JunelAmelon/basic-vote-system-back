<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des candidats</title>
</head>
<body>
    @foreach($candidats as $candidat)
    <ul>
        <li>{{$candidat->nom}} {{' '}} {{$candidat->prenom }} {{"||"}} {{"Nombre de vote:" }} {{ $candidat->nombre_vote}}</li>
    </ul>
    @endforeach
</body>
</html>
