<?php
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=db_cinema2;charset=utf8', 'root', '');
}

$test_film = $mysqlClient-> prepare('SELECT * FROM film');
$test_film -> execute();
$films = $test_film->fetchAll();

foreach ($films as $champs) {
    $ids [] = $champs ["id"];
    $titres [] = $champs ["titre"] ;
    $durees [] = $champs ["durée"] ;
    $resumes [] = $champs ["résumé"] ;
    $dates [] = $champs ["date"] ;
    $pays [] = $champs ["pays"] ;
    $images [] = $champs ["image"];
}
foreach ($dates as $date) {
    $dates_ymj = explode("-",$date);
    $annees [] = $dates_ymj [0];
    $mois [] = $dates_ymj [1];
    $jours [] = $dates_ymj [2];
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
