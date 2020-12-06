<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php'; /*Connection to bdd*/
    if(isset($_GET["name"]) && isset($_GET["latitude"]) && isset($_GET["longitude"])) { /*Check if name latitude and longitude exist*/
        $statement = $bdd->prepare('SELECT name FROM beehives WHERE name = "'.$_GET['name'].'";'); 
        $statement->execute(); /*Check if the name exists*/
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(empty($results)) {
            try { /*Insert the new value in to beehives*/
                $statement = $bdd->prepare('INSERT INTO beehives (id, name, latitude, longitude) VALUES (NULL,"'.$_GET['name'].'", "'.floatval($_GET["latitude"]).'", "'.floatval($_GET["longitude"]).'");');
                $statement->execute();
            } catch (PDOException $e) {
                $json = json_encode(array("error" => "beehives_sqlerror"));
                echo $json;
                return $json;
            }
            $json = json_encode(array("success" => "beehives_ok"));/*If try is good encode data and return json*/
            echo $json;
            return $json;
        } else {
            $json = json_encode(array("error" => "beehives_exists"));
            echo $json;
            return $json;
        }
    } else {
        $json = json_encode(array("error" => "beehives_parameter"));
        echo $json;
        return $json;
    }
?>