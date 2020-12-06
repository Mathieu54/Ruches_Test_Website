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
        <title>Home | Republic - Of - Beehives</title>

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

                <div class="row">

                    <div class="col-md-8">
                        
                        <div class="row">
                            <div class="col-md-3 img_user">
                                <img src="img/user_icon.png" height="150px" width="150px" class="mx-auto d-block"/>
                            </div>
                            <div class="col-md-9 margin_top text-secondary">
                                <label for="basic-url">Template Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="Uncompleted Profile">
                                    </div>
                                <label for="basic-url">Subject</label><span class="system_var">Insert system variable ▼</span>
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="Hello, %USER_FULL_NAME%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-secondary">
                            <label for="exampleFormControlTextarea1">Message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="15">Hello %USER_FULL_NAME% !
        
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, quisquam quae? Vero dolores nihil velit a obcaecati, cupiditate exercitationem magnam natus molestiae qui ullam! Nemo ratione itaque impedit! Ea, earum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, temporibus, tempore dignissimos id vero illum expedita culpa voluptatum neque rem sit libero deleniti sapiente dolore? Veniam animi itaque neque ab!
                            </textarea>
                        </div> 
                    </div>

                    <div class="col-md-4">
                        <div class="card" style="width: 19rem; margin-top: 20px">
                            <svg class="bd-placeholder-img img-thumbnail" width="320" height="300" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><title>A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera</title><rect width="150%" height="150%" fill="#868e96"></rect><text x="40%" y="50%" fill="#dee2e6" dy=".5em">320x200</text></svg>
                            <div class="card-body">
                                <h3 class="card-title">Thumbnail label</h3>
                                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore odio corporis rem, aliquam deleniti eos commodi quia. Consectetur assumenda explicabo voluptates, porro quisquam eaque illum repellat unde sed rerum quis?</p>
                                <button type="button" class="btn btn-primary">Button</button>
                                <button type="button" class="btn btn-light">Button</button>
                            </div>
                        </div>        
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-8 text-secondary">
                        <label for="exampleFormControlTextarea1">Message Type</label>
                        <div class="dropdown">
                            <button class="btn width_input text-left btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Email + Push
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Email + Push</button>
                                <button class="dropdown-item" type="button">Email</button>
                                <button class="dropdown-item" type="button">Other</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-secondary">
                        <label for="exampleFormControlTextarea1">Tap Target</label>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle width_input text-left" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile Screen
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button">Profile Screen</button>
                                <button class="dropdown-item" type="button">Not Profile</button>
                                <button class="dropdown-item" type="button">Other</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row rowtop">
                    <div class="col-md-8">
                        <label class="text-secondary" for="exampleFormControlTextarea1">Send to Group</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                            <label class="form-check-label" for="defaultCheck1">
                                Top Management
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Marketing Department
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                            <label class="form-check-label" for="defaultCheck1">
                                Design Department
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Financial Department
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Supply Department
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleFormControlTextarea1" class="text-secondary">Set Type</label>
                        <div class="radio">
                            <input type="radio" name="optradio" checked>
                            <span class="badge badge-success">News</span>
                        </div>
                        <div class="radio">
                            <input type="radio" name="optradio" checked>
                            <span class="badge badge-info">Reports</span>
                        </div>
                        <div class="radio">
                            <input type="radio" name="optradio" checked>
                            <span class="badge badge-warning">Documents</span>
                        </div>
                        <div class="radio">
                            <input type="radio" name="optradio" checked>
                            <span class="badge badge-primary">Media</span>
                        </div>
                        <div class="radio">
                            <input type="radio" name="optradio" checked>
                            <span class="badge badge-secondary">Text</span>
                        </div>
                    </div>
                </div>

                <div class="row rowtop">
                    <div class="col-md-8">
                        <button type="button" class="width_button btn btn-primary">Valider</button>
                        <button type="button" class="btn btn-light">Annuler</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="width_button btn btn-danger">Supprimer</button>
                    </div>
                </div>

            </div>
        </main>
        
        <script src="js/library/jquery.min.js"></script>
        <script src="js/library/bootstrap.min.js"></script>

    </body>
</html>
