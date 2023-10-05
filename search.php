<?php
    include('header.php');
?>

<?php
    // Remplacez 'YOUR_BEARER_TOKEN' par votre propre jeton d'accès (Bearer Token)
    $bearer_token = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk';

    // Récupérez le terme de recherche depuis la requête GET
    $envio = isset($_GET['search_field']) ? $_GET['search_field'] : '';

    // Construisez l'URL de l'API pour la recherche
    $api_url = 'https://api.themoviedb.org/3/search/movie';
    $url = "$api_url?query=" . urlencode($envio);

    // Options pour la requête HTTP
    $options = [
        'http' => [
            'header' => "Authorization: Bearer $bearer_token"
        ]
    ];

    // Créer un contexte pour la requête HTTP
    $context = stream_context_create($options);

    // Effectuer la requête HTTP
    $response = file_get_contents($url, false, $context);

    // Vérifiez si la requête a réussi
    if ($response !== FALSE) {
        // Décodage de la réponse JSON en tableau associatif
        $movies = json_decode($response, true);

        // Affichez les résultats de la recherche
        foreach ($movies['results'] as $movie) {
            // echo 'Titre du film : ' . $movie['title'] . '<br>';
        }
    } else {
        echo 'Erreur lors de la récupération des données.';
    }
?>


<!-- Afficher les cinq premiers films -->
<div class="movies-section">
<p class="text-right"><a href="allLatestTrailers.php">See all</a></p>
<?php
    $i = 0;
  // Boucle pour afficher les films
    foreach ($movies['results'] as $movie) {

    // Trouver le genre du film en fonction de son ID
    $genre_ids = $movie['genre_ids']; // Tableau d'IDs de genre
    $film_genres = array();
    foreach ($genre_ids as $genre_id) {
        foreach ($genremovie as $genre) {
            if ($genre['id'] === $genre_id) {
                $film_genres[] = $genre['name'];
            }
        }
    }

    // Affichage du film
    echo '<div class="movie" style="margin: 17px">';
        echo '<div class="movie-image">';

        echo '<span class="play">';
        echo '<span class="name">' . $movie['title'] . '</span>';
        echo '</span>';

        echo '<a href="#"><img src="https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] . '" alt="" /></a>';
        echo '</div>';

        echo '<div class="rating">';
        echo '<p>Genres: ' . implode(', ', $film_genres) . '</p><br>'; // Afficher les genres
        echo '<div class="stars">';
        echo '<div class="stars-in"></div>';
        echo '</div>';
        echo '<span class="comments">12</span>';
        // Lien vers movieDetails.php avec l'ID du film en tant que paramètre
        echo '<a href="movieDetails.php?id=' . $movie['id'] . '">Voir les détails</a>';
        echo '</div>';
        echo '</div>';

  }
  ?>
</div>

    <div class="cl">&nbsp;</div>
    </div>

<?php
  include('footer.php');
?>
