<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php';
    $statement = $bdd->prepare("SELECT name, date, weight, temperature, humidity FROM data_beehives, beehives WHERE beehives_id = beehives.id LIKE CONCAT('%','".$_GET["search"]."', '%')");/*Query get all data with LIKE to search specific name*/
    $statement->execute(); 
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results); /*Return data*/
    echo $json;
    return $json;
?>