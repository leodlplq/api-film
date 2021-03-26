<?php

function connection(){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=films_imac", "root", "leod1704", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br />";
        die(1);
    }

    return $pdo;
}


function getAllFilm(){
    $pdo = connection();
    $sql = "SELECT * FROM film";
    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchall();
}

function getAFilm($id){
    $pdo = connection();
    $sql = "SELECT * FROM film WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}

function getDirectorInformation($id){
    $pdo = connection();
    $sql = "SELECT * FROM director WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    return $query->fetchall();
}






?>

