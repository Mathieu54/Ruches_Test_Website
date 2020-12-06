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
        <title>Informations Ruches | Republic - Of - Beehives</title>

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
                    <li class="nav-item">
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
                    <li class="nav-item active">
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

        <main role="main">

            <div class="container">

                <div class="row" id="rowtop">

                    <div class="col-md-6">
                        <h3>Informations des ruches</h3>
                    </div>

                    <div class="col-md-6">
                        <input name="search_beehives_data" id="search_beehives_data" class="test form-control mr-sm-1" type="search" placeholder="Rechercher">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Ruche <a href="#">↓</a></th>
                                    <th scope="col">Date <a href="#">↓</a></th>
                                    <th scope="col">Poids <a href="#">↓</a></th>
                                    <th scope="col">Température <a href="#">↓</a></th>
                                    <th scope="col">Humidité <a href="#">↓</a></th>
                                </tr>
                            </thead>
                                <script>
                                    getBeehivesData(10).then((data) => {
                                        createRows(data, true);
                                    }).catch((error) => {
                                        console.log(error);
                                    });
                                </script>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        Ligne 1 à 8 sur 8<br>
                        <input id="nbperpage" name="nbperpage" type="number" min="1" value="1"/> lignes par page
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </main>

        <script src="js/library/bootstrap.min.js"></script>
        <script>

        </script>
    </body>
</html>
