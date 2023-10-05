<?php
// Paramètres pour l'URL de l'API
$api_url = 'https://api.themoviedb.org/3/discover/movie';
$genre_id = 18; // ID du genre pour "Drame"

// Construire l'URL avec les paramètres
$url = "$api_url?with_genres=$genre_id";

// Options pour la requête HTTP
$options = [
    'http' => [
        'header' => "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk"
    ]
];

// Créer un contexte pour la requête HTTP
$context = stream_context_create($options);

// Effectuer la requête HTTP pour obtenir les films du genre "Drame"
$movies_response = file_get_contents($url, false, $context);

if ($movies_response !== FALSE) {
    $movies = json_decode($movies_response, true);

    // Afficher les films
    foreach ($movies['results'] as $movie) {
        echo 'Titre du film : ' . $movie['title'] . '<br>';
    }
} else {
    echo 'Erreur lors de la récupération des films.';
}
?>
