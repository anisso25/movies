<?php
include("header.php");
?>

<?php
if (isset($_GET['id'])) {
    $film_id = $_GET['id'];
    // Effectuer une requête à l'API pour obtenir les détails du film avec l'ID $film_id

    // Endpoint de l'API pour obtenir les détails d'un film
    $film_details_endpoint = 'https://api.themoviedb.org/3/movie/' . $film_id;

    // Options pour la requête HTTP pour les détails du film
    $film_details_options = [
        'http' => [
            'header' => 'Authorization: Bearer ' . $bearer_token,
            'method' => 'GET'
        ]
    ];

    // Créer un contexte pour la requête HTTP pour les détails du film
    $film_details_context = stream_context_create($film_details_options);

    // Effectuer la requête HTTP pour obtenir les détails du film
    $film_details_response = file_get_contents($film_details_endpoint, false, $film_details_context);

    if ($film_details_response !== FALSE) {
        $film_details = json_decode($film_details_response, true);

        // Afficher les détails du film
        $title = $film_details['title'];
        $poster_path = 'https://image.tmdb.org/t/p/w500/' . $film_details['poster_path'];
        $rating = $film_details['vote_average'];
        $overview = $film_details["overview"];
        $popularity = $film_details["popularity"];
        $runtime = $film_details["runtime"];
        $revenue = $film_details["revenue"];
        $status = $film_details["status"];
        $original_language = $film_details["original_language"];
        $tagline = $film_details["tagline"];
        $vote_average = $film_details["vote_average"];
        $vote_count = $film_details["vote_count"];
        $budget = $film_details["budget"];

        $release_date = $film_details["release_date"];
        $formatted_release_date = date('d F Y', strtotime($release_date));

        $genres = array();
        foreach ($film_details['genres'] as $genre) {
            $genres[] = $genre['name'];
        }
        $spoken_languages = array();
        foreach ($film_details['spoken_languages'] as $spoken_language) {
            $spoken_languages[] = $spoken_language['english_name'];
        }
        $production_companies = array();
        foreach ($film_details['production_companies'] as $production_companie) {
            $production_companies[] = $production_companie['name'];
        }
        $production_countries = array();
        foreach ($film_details['production_countries'] as $production_countrie) {
            $production_countries[] = $production_countrie['name'];
        }

        $revenue = $film_details["revenue"]; // Le budget du film (exemple)
        // Formatez le budget pour l'afficher correctement
        $formatted_revenue = '$' . number_format($revenue, 0, '.', ','); // Format: $60,000,000

        $budget = $film_details["budget"]; // Le budget du film (exemple)
        // Formatez le budget pour l'afficher correctement
        $formatted_budget = '$' . number_format($budget, 0, '.', ','); // Format: $60,000,000

    } else {
        echo 'Erreur lors de la récupération des détails du film.';
    }
} else {
    echo 'ID du film non spécifié.';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Detail</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <style>
        /* Ajoutez du CSS pour placer les éléments à droite de l'image */
        #movie-details {
            display: flex;
            align-items: flex-start; /* Alignement vertical en haut */
        }

        #movie-details img {
            margin-right: 20px; /* Marge à droite de l'image */
        }

        /* Ajoutez d'autres styles CSS selon vos besoins */
    </style>
</head>
<body>
    <!-- START PAGE CONTENT -->
    <div id="shell">
        <!-- Replace this with your movie details -->
        <div id="movie-details">
            <img style="width: 250px;" src="<?php echo $poster_path; ?>" alt="Movie Poster">
            <div>
                <h1><?php echo $title; ?></h1>
                <p>Genres: <?php echo implode(', ', $genres); ?></p>
                <p>Rating: <?php echo $rating; ?></p>
                <p>Overview: <?php echo $overview; ?></p>
                <p>popularity: <?php echo $popularity; ?></p>
                <p>runtime: <?php echo $runtime; ?> minutes</p>
                <p>spoken languages: <?php echo implode(', ', $spoken_languages); ?></p>
                <p>original language: <?php echo $original_language; ?></p>
                <p>production companies: <?php echo implode(', ', $production_companies); ?></p>
                <p>production countries: <?php echo implode(', ', $production_countries); ?></p>
                <p>original language: <?php echo $formatted_release_date; ?></p>
                <p>revenue: <?php echo $formatted_revenue; ?></p>
                <p>status: <?php echo $status; ?></p>
                <p>tagline: <?php echo $tagline; ?></p>
                <p>vote average: <?php echo $vote_average; ?></p>
                <p>vote count: <?php echo $vote_count; ?></p>
                <p>budget: <?php echo $formatted_budget; ?></p>
                <!-- Vous pouvez ajouter plus de détails du film ici en utilisant les données de $film_details -->
            </div>
        </div>
        <!-- End of movie details -->

        <!-- Link back to the homepage -->
        <a href="index.php">Back to Home</a>
    </div>
    <!-- END PAGE CONTENT -->
</body>
</html>




<?php
// include("footer.php");
?>