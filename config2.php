<?php
    // Endpoint de l'API pour les topratedmovie populaires
    $films_endpoint = 'https://api.themoviedb.org/3/movie/top_rated';

    // Bearer Token
    $bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk'; // Remplacez par votre jeton Bearer

    // Paramètres pour les topratedmovie (langue et page)
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $films_params = [
        'language' => 'fr-FR', // Langue française
        'page' => $page // Numéro de la page
    ];

    // Options pour la requête HTTP pour les topratedmovie
    $films_options = [
        'http' => [
            'header' => 'Authorization: Bearer ' . $bearer_token,
            'method' => 'GET'
        ]
    ];

    // Créer un contexte pour la requête HTTP pour les topratedmovie
    $films_context = stream_context_create($films_options);

    // Effectuer la requête HTTP pour les topratedmovie
    $films_response = file_get_contents($films_endpoint . '?' . http_build_query($films_params), false, $films_context);

    // Vérifier si la requête pour les topratedmovie a réussi
    if ($films_response === FALSE) {
        die('Erreur lors de la récupération des données des topratedmovie.');
    }

    // Convertir la réponse JSON en tableau associatif
    $topratedmovie = json_decode($films_response, true);

    // print_r($topratedmovie);
    // Vous pouvez maintenant utiliser la variable $topratedmovie pour les données des topratedmovie
?>