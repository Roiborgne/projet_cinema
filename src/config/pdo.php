<?php
const DB_HOST = 'localhost:3306';
const DB_NAME = 'db_cinema2';
const DB_USER = "root";
const DB_PASSWORD = "";

function connexion():PDO{

    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD
    );
    // Activer les erreurs PDO
    //$mysqlClient = new PDO('mysql:host=localhost;dbname=db_cinema;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
    }
