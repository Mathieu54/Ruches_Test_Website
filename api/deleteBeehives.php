<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php'; /*Connection to bdd*/
    if(isset($_GET["id"])) { /*Check if id exist*/
        try {
            $statement = $bdd->prepare('DELETE FROM beehives WHERE beehives.id = "'.$_GET["id"].'";');/*Delete the beehives with id*/
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
        $json = json_encode(array("error" => "beehives_parameter_id"));
        echo $json;
        return $json;
    }
?>