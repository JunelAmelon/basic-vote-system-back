<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identification du candidat</title>
</head>
<body>

@if(session('status'))
<p>{{session('status')}}</p>
@endif
    <h1> Bienvenu sur votre plateforme d'election</h1>
    @foreach($errors->all() as $error)
    <p>{{ error }}</p>
    @endforeach
    <form action="/identification/traitement" method="POST">
    @csrf
    <input type="text" placeholder="Entrez votre identifiant" name="id"> <br>
    <button type="submit">Envoyer</button>
    </form>
</body>
</html>
