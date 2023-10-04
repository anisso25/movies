<?php
    // Endpoint de l'API pour les films populaires
    $films_endpoint = 'https://api.themoviedb.org/3/movie/popular';

    // Endpoint de l'API pour les genres de films
    $genres_endpoint = 'https://api.themoviedb.org/3/genre/movie/list';

    // Bearer Token
    $bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk';

    // Paramètres pour les films (langue et page)
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $films_params = [
        'language' => 'fr-FR', // Langue française
        'page' => $page // Numéro de la page
    ];

    // Paramètres pour les genres de films
    $genres_params = [
        'language' => 'fr-FR' // Langue française
    ];

    // Options pour la requête HTTP pour les films
    $films_options = [
        'http' => [
            'header' => 'Authorization: Bearer ' . $bearer_token,
            'method' => 'GET'
        ]
    ];

    // Options pour la requête HTTP pour les genres de films
    $genres_options = [
        'http' => [
            'header' => 'Authorization: Bearer ' . $bearer_token,
            'method' => 'GET'
        ]
    ];

    // Créer un contexte pour la requête HTTP pour les films
    $films_context = stream_context_create($films_options);

    // Créer un contexte pour la requête HTTP pour les genres de films
    $genres_context = stream_context_create($genres_options);

    // Effectuer la requête HTTP pour les films
    $films_response = file_get_contents($films_endpoint . '?' . http_build_query($films_params), false, $films_context);

    // Effectuer la requête HTTP pour les genres de films
    $genres_response = file_get_contents($genres_endpoint . '?' . http_build_query($genres_params), false, $genres_context);

    // Vérifier si la requête pour les films a réussi
    if ($films_response === FALSE) {
        die('Erreur lors de la récupération des données des films.');
    }

    // Vérifier si la requête pour les genres a réussi
    if ($genres_response === FALSE) {
        die('Erreur lors de la récupération des données des genres de films.');
    }

    // Convertir les réponses JSON en tableaux associatifs
    $films = json_decode($films_response, true);
    $genres_data = json_decode($genres_response, true);

    // Extraire les genres de films
    $genremovie = $genres_data['genres'];

    // Vous pouvez maintenant utiliser la variable $films_data pour les données des films
    // et la variable $genremovie pour les genres de films

    // var_dump($films);
?>
