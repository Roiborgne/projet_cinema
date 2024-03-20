<?php
const DB_HOST = 'mysql';
const DB_NAME = 'db_films';
const DB_USER = "root";
const DB_PASSWORD = "";
function connection(){

    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD
    );
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, DOO::ERRMODE_EXCEPTION);

    return $pdo;
    }
?>