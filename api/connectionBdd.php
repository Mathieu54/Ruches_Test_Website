<?php
    $user = "root";
    $password = "";
    $host = "localhost";
    $db_name = "bdd_ruches_tallyos";
    try {
        $bdd = new PDO("mysql:host=". $host .";dbname=" . $db_name . "", $user, $password);
    } catch (PDOException $e) {
        die();
    }
?>