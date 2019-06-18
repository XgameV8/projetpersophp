
<?php
  include "conf/info.php";
  $title="Upcoming Movies";
  include_once "header.php";
?>
    <h1>Films à venir</h1>
    <?php
      include_once "api/api_upcoming.php";
      $min = date('d F Y', strtotime($upcoming->dates->minimum));
      $max = date('d F Y', strtotime($upcoming->dates->maximum));
      echo "<h5><sub>à venir bientôt </sub> <span>". $min . "</span> , <sub>jusqu'au</sub> <span>" . $max . "</span></h5>";
    ?>
    <hr>
    <ul>
      <?php
        foreach($upcoming->results as $p){
          echo '<li><a href="movie.php?id=' . $p->id . '"><img src="'.$imgurl_1.''. $p->poster_path . '"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h5><em>Qualité : " . $p->vote_average . " | Vote : " . $p->vote_count . " | Popularité : " . round($p->popularity) . "</em></h5><h5>Date de sortie : ". date('d F Y', strtotime($p->release_date)) . "</h5></a></li>";
        }
      ?>
    </ul>

<?php
  include_once "footer.php";
?>