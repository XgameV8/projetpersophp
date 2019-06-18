<!DOCTYPE html>
<?php
try
{
    $db = new PDO("mysql:host=localhost;dbname=films;charset=utf8", 'root', '123');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>
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



<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 well well-sm">
            <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
            <form action="#" method="post" class="form" role="form">
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <input class="form-control" name="firstname" placeholder="First Name" type="text"
                               required autofocus />
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                    </div>
                </div>
                <input class="form-control" name="youremail" placeholder="Your Email" type="email" />
                <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
                <input class="form-control" name="password" placeholder="New Password" type="password" />
                <label for="">
                    Birth Date</label>
                <div class="row">
                    <div class="col-xs-4 col-md-4">
                        <select class="form-control">
                            <option value="Month">Month</option>
                        </select>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <select class="form-control">
                            <option value="Day">Day</option>
                        </select>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <select class="form-control">
                            <option value="Year">Year</option>
                        </select>
                    </div>
                </div>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                    Male
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                    Female
                </label>
                <br />
                <br />
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign up</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
