<?php


if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];

    $token = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjMWVjNWRhZTk5NTZlZTE0YjMwYzIxYzhjZjlkNWY5MSIsInN1YiI6IjY1MGM3MDNhYjViYzIxMDEwYmQyODRmOSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.AkqYdopSmyXNAti6A5Va9Ymu-MPJB-kpLO8y3onCWCk"; // Remplacez par votre Bearer Token

    $api_url = "https://api.themoviedb.org/3/movie/{$film_id}/videos";

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer {$token}"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response) {
        $data = json_decode($response, true);

        // Vérifiez si la réponse contient des vidéos
        if (!empty($data['results'])) {
            // Récupérez l'URL de la première vidéo
            $video_key = $data['results'][0]['key'];
            $video_url = "https://www.youtube.com/embed/{$video_key}";

            // Affichez la vidéo dans une balise iframe
            echo '<iframe width="560" height="315" src="' . $video_url . '" frameborder="0" allowfullscreen></iframe>';
        } else {
            echo 'Aucune vidéo disponible.';
        }
        } else {
            echo 'Erreur lors de la récupération des données depuis l\'API.';
            };
    } else {
    echo 'ID du film non spécifié.';
}

// curl_close($ch);
?>