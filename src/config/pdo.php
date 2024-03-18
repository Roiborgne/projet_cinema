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



$test_utilisateur = $mysqlClient-> prepare('SELECT * FROM utilisateur');
$test_utilisateur -> execute();
$utilisateurs = $test_utilisateur->fetchAll();

foreach ($utilisateurs as $champs_utilisateur) {
$id_utilisateur [] = $champs_utilisateur ["id_utilisateur"];
$email_utilisateur [] = $champs_utilisateur ["email_utilisateur"] ;
$pseudo_utilisateur[] = $champs_utilisateur ["pseudo_utilisateur"] ;
$mdp_utilisateur [] = $champs_utilisateur ["mdp_utilisateur"] ;
}
?>