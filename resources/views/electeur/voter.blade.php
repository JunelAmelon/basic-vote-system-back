<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>

    @if (Session::has('nomP'))
    <p>Bienvenue {{ Session::get('nomP') }}</p>
    @endif
    @if (Session::has('error'))
    <p style="color: red;">Erreur: {{ Session::get('error') }}</p>
    @endif

    @if (Session::has('success'))
    <p style="color: green;">Succès: {{ Session::get('success') }}</p>
    @endif


    <h2>Liste des candidats</h2>

    <ul>
        <li><a href="{{ route('voterTraitement', ['id_candidat' => 1, 'id_utilisateur' => Session::has('id_utilisateur') ? Session::get('id_utilisateur') : null]) }}">Tony</a></li>
        <li><a href="{{ route('voterTraitement', ['id_candidat' => 2, 'id_utilisateur' => Session::has('id_utilisateur') ? Session::get('id_utilisateur') : null]) }}">Marck</a></li>
        <li><a href="{{ route('voterTraitement', ['id_candidat' => 3, 'id_utilisateur' => Session::has('id_utilisateur') ? Session::get('id_utilisateur') : null]) }}">John</a></li>
        <li><a href="{{ route('voterTraitement', ['id_candidat' => 4, 'id_utilisateur' => Session::has('id_utilisateur') ? Session::get('id_utilisateur') : null]) }}">Steev</a></li>
    </ul>
</body>
</html>
