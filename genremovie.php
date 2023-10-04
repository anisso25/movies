<?php
    include('config.php'); // Assurez-vous que vous incluez votre fichier de configuration

    // ... Votre code pour récupérer les genres de films ...

    // Vérifier si la requête pour les genres a réussi
    if ($genres_response === FALSE) {
        die('Erreur lors de la récupération des données des genres de films.');
    }

    // Convertir les réponses JSON en tableaux associatifs
    $genres_data = json_decode($genres_response, true);

    // Extraire les genres de films
    $genremovie = $genres_data['genres'];
?>