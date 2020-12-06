
<!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Welcome to Republic Of Beehives here you can manage your connected hives and see their information in real time !">
      <meta name="author" content="Mathieu Harmant">
      <title>Login | Republic - Of - Beehives</title>

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

    <body class="text-center">

      <form class="form-signin" method="POST">

        <h1 class="h3 mb-3 font-weight-normal">Merci de vous connecter</h1>
        <label for="inputUser" class="sr-only">Login</label>
        <input type="text" id="username" class="form-control" name="username" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="password" name="password"  class="form-control" placeholder="Mot de passe" required autocomplete="on">
        <button class="btn btn-lg btn-primary btn-block" name="submitBtnLogin" type="submit">Se connecter</button>

      </form>
      
      <script src="js/library/jquery.min.js"></script>                    
      <script src="js/library/bootstrap.min.js"></script>

    </body>

</html>

<?php
  session_start(); //Session start to store the session of user IMPORTANT
  require_once("./api/connectionBdd.php"); //Require Connection to bdd
  if(isset($_POST['submitBtnLogin'])) { //Check if button submit login is submit
    $username = trim($_POST['username']); //Trim the data to delete extra space
    $password = trim($_POST['password']);
    if($username != "" && $password != "") { //Check if the value are not empty
      try {
        $query = "SELECT * FROM users where `username`=:username and `password`=:password"; //Request prepare sql to stop injection sql
        $stmt = $bdd->prepare($query);
        $stmt->bindParam('username', $username, PDO::PARAM_STR); //Adding value to the request
        $stmt->bindValue('password', sha1($password), PDO::PARAM_STR);
        $stmt->execute(); 
        $count = $stmt->rowCount(); //Get the count of row
        $row   = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row)) { //If count = 1 and row is no empty ! 
          $_SESSION['user_session']   = $row['id'];
          header("location: home.php"); //User are connected !
        } else { 
          //Bad password or username
          echo"<div class=\"alert alert-danger\"> 
          Mauvais Mot de passe ou Username
          </div>";
        }
      } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
      }
    } else {
      //Empty values
      echo"<div class=\"alert alert-danger\">
      Les deux champs sont obligatoires !
      </div>";
    }
  }
?>
