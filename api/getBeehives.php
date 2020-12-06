<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php';
    $statement = $bdd->prepare("SELECT * FROM beehives;"); /*Get all the beehives*/
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json; /*Return all data beehives into json*/
    return $json;
?>