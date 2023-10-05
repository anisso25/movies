<?php
include('header.php');
?>
<?php
// Paramètres pour l'URL de l'API
$api_url = 'https://api.themoviedb.org/3/discover/movie';
if (isset($_GET['genre_id'])) {
    $genre_id = $_GET['genre_id'];
} else {
    echo 'ID du genre non spécifié.';
}

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
        // echo 'Titre du film : ' . $movie['title'] . '<br>';
    }
} else {
    echo 'Erreur lors de la récupération des films.';
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