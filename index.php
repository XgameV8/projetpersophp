<?php session_start() ?>
<?php
include "conf/info.php";
$title="Films au cinéma";
include_once "header.php";

?>

<h1>Actuellement</h1>
<?php
include_once "api/api_now.php";

$min = date('j F Y', strtotime($nowplaying->dates->minimum));
$max = date('j F Y', strtotime($nowplaying->dates->maximum));
echo "<h5><sub>De</sub> <span>". $min . "</span> , <sub>Jusqu'au</sub> <span>" . $max . "</span></h5>";
?>
<hr>
<ul>
    <?php

    foreach($nowplaying->results as $p){
        echo '<li><a href="movie.php?id=' . $p->id . '"><img src="'.$imgurl_1.''. $p->poster_path . '"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h5><em> Qualité : " . $p->vote_average . " | Vote : " . $p->vote_count . " | Popularité: " . round($p->popularity) . "</em></h5></a></li>";
    }
    ?>
</ul>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>