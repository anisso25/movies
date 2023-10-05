<?php
  include('config.php');
  include('config2.php');
  include('genremovie.php');
  $api_key = 'c1ec5dae9956ee14b30c21c8cf9d5f91';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MovieHunter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-func.js"></script>
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<script>
  function changeGenre(selectedValue) {
    // Vérifiez si l'utilisateur a sélectionné un genre valide (pas le texte par défaut)
    if (selectedValue !== "#") {
      // Redirige vers la page viewGenre.php avec le genre_id comme paramètre
      window.location.href = selectedValue;
    }
  }
</script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="index.php">MovieHunter</a></h1>
    <div class="social"> <span>FOLLOW US ON:</span>
      <ul>
        <li><a class="twitter" href="#">twitter</a></li>
        <li><a class="facebook" href="#">facebook</a></li>
        <li><a class="vimeo" href="#">vimeo</a></li>
        <li><a class="rss" href="#">rss</a></li>
      </ul>
    </div>

    <div id="navigation">
      <select id="genreDropdown" onchange="changeGenre(this.value)">
        <option value="#" selected>Sélectionnez un genre</option>
        <?php
          foreach ($genremovie as $genre) {
            echo '<option value="viewGenre.php?genre_id=' . $genre['id'] . '">' . $genre['name'] . '</option>';
          }
        ?>
      </select>
    </div>


    <div id="sub-navigation">
      <ul>
        <li><a href="#">SHOW ALL</a></li>
        <li><a href="#">LATEST TRAILERS</a></li>
        <li><a href="#">TOP RATED</a></li>
        <li><a href="#">MOST COMMENTED</a></li>
      </ul>
      <div id="search">
        <form action="search.php" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="search_field" value="Enter search here" id="search-field" class="blink search-field" />
          <input type="submit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
  <div id="main">
    <div id="content">
      <div class="box">
        <div class="head">
          <h2>LATEST TRAILERS</h2>
        </div>
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
