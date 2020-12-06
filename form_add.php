<?php 
session_start();
if(isset($_SESSION['user_session']) && $_SESSION['user_session'] != "") {
    
} else { 
    header('location:index.php');
    return;
}
?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Welcome to Republic Of Beehives here you can manage your connected hives and see their information in real time !">
        <meta name="author" content="Mathieu Harmant">
        <title>Ajout Ruche | Republic - Of - Beehives</title>

        <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">

        <link href="css/library/bootstrap.min.css" rel="stylesheet">
        <link href="css/general_styles.css" rel="stylesheet">
        
        <script src="js/library/jquery.min.js"></script>
        <script src="js/api.js"></script>
        <script src="js/ruches.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="img/favicons/favicon-32x32.png"/> Republic Of Beehives</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./beehives.php">Ruches <span class="badge badge-pill badge-danger"><?php 
                            require_once './api/connectionBdd.php';
                            $statement = $bdd->prepare("SELECT COUNT(id) AS total FROM beehives;");
                            $statement->execute();
                            $row = $statement->fetch();
                            echo $row[0];
                        ?>
                    </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./informations.php">Informations</a>
                    </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-md-0">
                    <li class="nav-item">
                        <a href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            <div class="container">
                <div class="row" id="rowtop">
                <h2>Ajouter une ruche</h2>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nom de la ruche :</label>
                    <input type="text" class="form-control" id="name_add" placeholder="Exemple Ruche 1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Latitude :</label>
                    <input type="number" class="form-control" id="latitude_add" placeholder="Exemple 54.5845451">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Longitude :</label>
                    <input type="number" class="form-control" id="longitude_add" placeholder="Exemple 68.547851">
                </div>
                <button type="submit" class="btn btn-success" id="createBeehives">Créer</button>
                <button type="reset" class="btn btn-danger" id="cancelBeehives">Annuler</button>
            </div>
        </main>
        <script src="js/library/bootstrap.min.js"></script>
    </body>
</html>
