<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php';
    $statement = $bdd->prepare("SELECT * FROM beehives WHERE name LIKE CONCAT('%','".$_GET["search"]."', '%')");/*Query get all data with LIKE to search specific name*/
    $statement->execute(); 
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results); /*Return data*/
    echo $json;
    return $json;
?>