<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/config/pdo.php';


$test_film = $pdo-> prepare('SELECT * FROM film');
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

