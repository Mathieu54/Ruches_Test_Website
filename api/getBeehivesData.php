<?php
    header('Content-Type: application/json'); /*Header IMPORTANT to return JSON DATA*/
    require_once 'connectionBdd.php';
    $statement = $bdd->prepare("SELECT name, date, weight, temperature, humidity FROM data_beehives, beehives WHERE beehives_id = beehives.id;"); /*Get all informations beehives humidity etc...*/
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results); /*Data return */
    echo $json;
    return $json;
?>