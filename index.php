<?php
  include('header.php');
?>

<!-- Afficher les cinq premiers films -->
<div class="movies-section">
<p class="text-right"><a href="allLatestTrailers.php">See all</a></p>
  <?php
  $i = 0;
  // Boucle pour afficher les films
  foreach ($films['results'] as $film) {
    if ($i >= 4) {
        break; // Sortir après les 5 premiers films
    }

    // Trouver le genre du film en fonction de son ID
    $genre_ids = $film['genre_ids']; // Tableau d'IDs de genre
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
        echo '<span class="name">' . $film['title'] . '</span>';
        echo '</span>';

        echo '<a href="#"><img src="https://image.tmdb.org/t/p/w500/' . $film['poster_path'] . '" alt="" /></a>';
        echo '</div>';

        echo '<div class="rating">';
        echo '<p>Genres: ' . implode(', ', $film_genres) . '</p><br>'; // Afficher les genres
        echo '<div class="stars">';
        echo '<div class="stars-in"></div>';
        echo '</div>';
        echo '<span class="comments">12</span>';
    // Lien vers movieDetails.php avec l'ID du film en tant que paramètre
    echo '<a href="movieDetails.php?id=' . $film['id'] . '">Voir les détails</a>';
      echo '</div>';
    echo '</div>';

    $i++;
  }
  ?>
</div>

    <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>TOP RATED</h2>
          <p class="text-right"><a href="allTopRated.php">See all</a></p>
        </div>
        
        <div class="movies-container">
        <h2> </h2><br>

        <?php
  // Boucle pour afficher les films
  $i = 0;
  foreach ($topratedmovie['results'] as $film) {
      if ($i >= 4) {
          break; // Sortir après les 5 premiers films
      }

      // Trouver le genre du film en fonction de son ID
      $genre_ids = $film['genre_ids']; // Tableau d'IDs de genre
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
      echo '<span class="name">' . $film['title'] . '</span>';
      echo '</span>';
      echo '<a href="#"><img src="https://image.tmdb.org/t/p/w500/' . $film['poster_path'] . '" alt="" /></a>';
      echo '</div>';
      echo '<div class="rating">';
      echo '<p>Genres: ' . implode(', ', $film_genres) . '</p>'; // Afficher les genres
      echo '<div class="stars">';
      echo '<div class="stars-in"></div>';
      echo '</div>';
      echo '<span class="comments">12</span>';
    // Lien vers movieDetails.php avec l'ID du film en tant que paramètre
      echo '<a href="movieDetails.php?id=' . $film['id'] . '">Voir les détails</a>';
      echo '</div>';
      echo '</div>';

      $i++;
  }
  ?>

      </div>
    <div class="cl">&nbsp;</div>
      </div>
      <div class="box">
        <div class="head">
          <h2>MOST COMMENTED</h2>
          <p class="text-right"><a href="#">See all</a></p>
        </div>
        <div class="movie" style="margin: 17px">
          <div class="movie-image"> <span class="play"><span class="name">HOUSE</span></span> <a href="#"><img src="css/images/movie13.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie" style="margin: 17px">
          <div class="movie-image"> <span class="play"><span class="name">VACANCY</span></span> <a href="#"><img src="css/images/movie14.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie" style="margin: 17px">
          <div class="movie-image"> <span class="play"><span class="name">MIRRORS</span></span> <a href="#"><img src="css/images/movie15.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>
        <div class="movie" style="margin: 17px">
          <div class="movie-image"> <span class="play"><span class="name">THE KINGDOM</span></span> <a href="#"><img src="css/images/movie16.jpg" alt="" /></a> </div>
          <div class="rating">
            <p>RATING</p>
            <div class="stars">
              <div class="stars-in"> </div>
            </div>
            <span class="comments">12</span> </div>
        </div>

        <div class="cl">&nbsp;</div>
      </div>
    </div>
<?php
  include('footer.php');
?>