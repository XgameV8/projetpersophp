<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>




  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Film Actu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
              </li>

              <form method="post" action="connexion.php" class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="pseudo" placeholder="Pseudo" aria-label="pseudo">
                  <input class="form-control mr-sm-2" type="password" placeholder="Mot de passe" aria-label="password">
                  <button value="connexion" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Connexion</button>
              </form>
              <a class="btn btn-outline-primary my-2 my-sm-0" href="inscription.php" role="button">Inscription</a>
          </ul>
          <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
              <input class="form-control mr-sm-2" type="text" name="search" placeholder="Recherche" required>
              <select name="channel" required>
                  <option value="movie" selected="selected">Films
                  </option>
                  <option value="tv">Séries TV
                  </option>
              </select>
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher
              </button>
          </form>
      </div>
  </nav>

    <ul>
      <li>
        <a href="popular.php">Films Populaires
        </a>
      </li>
      <li>
        <a href="top-rated.php">Meilleurs Films
        </a>
      </li>
      <li>
        <a href="upcoming.php">Films à venir
        </a>
      </li>
      <li>
        <a href="tv-series.php">Séries TV
        </a>
      </li>
    </ul>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
