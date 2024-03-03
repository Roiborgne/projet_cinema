<?php
{
    $mysqlClient = new PDO('mysql:host=localhost;dbname=db_cinema;charset=utf8', 'root', '');
}

$test = $mysqlClient-> prepare('SELECT * FROM film');
$test -> execute();
$films = $test->fetchAll();

foreach ($films as $champs) {
    $ids [] = $champs ["id"];
    $titres [] = $champs ["titre"] ;
    $durees [] = $champs ["durée"] ;
    $resumes [] = $champs ["résumé"] ;
    $dates [] = $champs ["date"] ;
    $pays [] = $champs ["pays"] ;
    $images [] = $champs ["image"];
}
?>
