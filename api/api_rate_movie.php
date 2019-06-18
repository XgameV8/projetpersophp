<?php


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://api.themoviedb.org/3/movie/rating?api_key=" . $apikey);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response2 = curl_exec($ch);
curl_close($ch);
$rating = json_decode($response2);

?>
