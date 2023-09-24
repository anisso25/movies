<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films Populaires</title>
    <style>
        /* Ajoutez ici votre CSS pour le style si nécessaire */
        .pagination {
            display: flex;
            list-style: none;
        }
        .pagination li {
            margin-right: 10px;
        }
    </style>
</head>
<body>

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
?>

<?php foreach ($films['results'] as $film): ?>
    <li>
        <h2><?php echo $film['title']; ?></h2>
        <p><strong>Date de sortie:</strong> <?php echo $film['release_date']; ?></p>
        <p><strong>Popularity:</strong> <?php echo $film['popularity']; ?></p>
        <p><strong>Overview:</strong> <?php echo $film['overview']; ?></p>

        <?php if (!empty($film['poster_path'])): ?>
            <?php $imageUrl = 'https://image.tmdb.org/t/p/w500' . $film['poster_path']; ?>
            <img src="<?php echo $imageUrl; ?>" alt="Affiche du film <?php echo $film['title']; ?>">
        <?php else: ?>
            <p>Aucune image disponible pour ce film.</p>
        <?php endif; ?>

    </li>
<?php endforeach; ?>
<?php
    // Pagination
    if ($films['total_pages'] > 1) {
        echo '<ul class="pagination">';
        for ($i = 1; $i <= $films['total_pages']; $i++) {
            // Lien vers la page $i
            echo '<li><a href="?page=' . $i . '">Page ' . $i . '</a></li>';
        }
        echo '</ul>';
    }
    ?>

</body>
</html>
