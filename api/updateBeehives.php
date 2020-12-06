<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php';
    if(isset($_GET["id"])) { /*Chech if id exist*/
        if(isset($_GET["name"]) && isset($_GET["latitude"]) && isset($_GET["longitude"])) { /*Chech if name latitude longitude exist*/
            if(is_numeric($_GET["latitude"]) && is_numeric($_GET["longitude"])) {
                try {
                    /*Update the beehives with id*/
                    $statement = $bdd->prepare('UPDATE beehives SET name = "'.$_GET['name'].'", latitude = "'.$_GET["latitude"].'", longitude = "'.$_GET["longitude"].'" WHERE beehives.id = '. $_GET["id"] .';');
                    $statement->execute();
                } catch (PDOException $e) {
                    $json = json_encode(array("error" => "beehives_sqlerror"));
                    echo $json;
                    return $json;
                }
                $json = json_encode(array("success" => "beehives_ok"));
                echo $json; /*Return success*/
                return $json;
            } else {
                $json = json_encode(array("error" => "beehives_notnumber"));
                echo $json;
                return $json;
            }
        } else {
            $json = json_encode(array("error" => "beehives_parameter"));
            echo $json;
            return $json;
        }
    } else {
        $json = json_encode(array("error" => "beehives_parameter_id"));
        echo $json;
        return $json;
    }
?>