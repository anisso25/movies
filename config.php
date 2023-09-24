<?php
    // Endpoint de l'API
    $endpoint = 'https://api.themoviedb.org/3/movie/popular';

    // Bearer Token
    $bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk';

    // Paramètres pour l'API (langue et page)
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $params = [
        'language' => 'fr-FR', // Langue française
        'page' => $page // Numéro de la page
    ];

    // Options pour la requête HTTP
    $options = [
        'http' => [
            'header' => 'Authorization: Bearer ' . $bearer_token,
            'method' => 'GET'
        ]
    ];

    // Créer un contexte pour la requête HTTP
    $context = stream_context_create($options);

    // Effectuer la requête HTTP
    $response = file_get_contents($endpoint . '?' . http_build_query($params), false, $context);

    // Vérifier si la requête a réussi
    if ($response === FALSE) {
        die('Erreur lors de la récupération des données.');
    }

    // Convertir la réponse JSON en tableau associatif
    $films = json_decode($response, true);

    // print_r($films);


    // // Afficher le contenu JSON avec print_r
    // echo 'Contenu JSON avec print_r :<br>';
    // print_r(json_decode($response, true));

    // echo '<br><br>';

    // // Afficher le contenu JSON avec var_dump
    // echo 'Contenu JSON avec var_dump :<br>';
    // var_dump(json_decode($response, true));
?>