<? session_start('') ?>
<?php
include "conf/info.php";

$id_movie = $_GET['id'];
include_once "api/api_movie_id.php";
include_once "api/api_movie_video_id.php";
include_once "api/api_movie_similar.php";
include_once "api/api_token_user.php";
include_once "api/api_session_guest.php";
include_once "api/api_rate_movie.php";
$title = "Detail Movie (" . $movie_id->original_title . ")";
include_once "header.php";

?>

<?php
if (isset($_GET['id'])){
$id_movie = $_GET['id'];
?>
<h1><?php echo $movie_id->original_title ?></h1>
<?php
echo "<h5>~ " . $movie_id->tagline . " ~</h5>";
?>

<?php

foreach ($movie_video_id->results as $video) {
    echo '<iframe width="560" height="315" src="' . "https://www.youtube.com/embed/" . $video->key . '" frameborder="0" allowfullscreen></iframe>';
}
?>"

<hr>
<img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
<p>Titre : <?php echo $movie_id->original_title ?></p>
<p>Slogan : <?php echo $movie_id->tagline ?></p>
<p>Genres :
    <?php
    foreach ($movie_id->genres as $g) {
        echo '<span>' . $g->name . '</span> ';
    }
    ?>
</p>
<p>Résumé : <?php echo $movie_id->overview ?></p>
<p>Date de sortie : <?php $rel = date('d F Y', strtotime($movie_id->release_date));
    echo $rel ?>
<p>Production :
    <?php
    foreach ($movie_id->production_companies as $pc) {
        echo $pc->name . " ";
    }
    ?>
</p>
<p>Pays De Production :
    <?php
    foreach ($movie_id->production_countries as $pco) {
        echo $pco->name . "&nbsp;&nbsp;";
    }
    ?>
</p>
<p>Budget: $ <?php echo $movie_id->budget ?> </p>
<p>Vote Qualité :  </p>
<p>Nombre de votes : </p>



<form action="" method="post">
    <input type="number" name="quantity" min="1" max="5">
    <button type="submit" name="valider" > Vote</button>
</form>



<hr>
<h3>Films Similaires</h3>
<ul>
    <?php
    $count = 4;
    $output = "";
    foreach ($movie_similar_id->results as $sim) {
        $output .= '<li><a href="movie.php?id=' . $sim->id . '"><img src="http://image.tmdb.org/t/p/w300' . $sim->backdrop_path . '"><h5>' . $sim->title . '</h5></a></li>';
        if ($count <= 0) {
            break;
            $count--;
        }
    }
    }
    echo $output;
    ?>
</ul>

