<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/config/pdo.php';

function recupFilms(): array
{
    $pdo = connexion();
    $films = $pdo->query("SELECT * FROM film");
    return $films->fetchAll(PDO::FETCH_ASSOC);
}
function recupMesFilms($id_utilisateur): array
{
    $pdo = connexion();
    $films = $pdo->query("SELECT * FROM film where $id_utilisateur = id_utilisateur");
    return $films->fetchAll(PDO::FETCH_ASSOC);
}


function recupDetails($nom): array
{
    $pdo = connexion();
    $details = $pdo->query("SELECT * FROM film WHERE id = $nom");
    return $details->fetch(PDO::FETCH_ASSOC);
}

function ajoutFilm($titre, $duree, $resume, $date, $pays, $image, $id_utilisateur): void
{
    $pdo = connexion();
    $resume = str_replace("'","\'", $resume);
    $pdo->query("INSERT INTO `film` (`id`, `titre`, `durée`, `résumé`, `date`, `pays`, `image`, `id_utilisateur`) VALUES (NULL, '$titre', '$duree', '$resume', '$date', '$pays', '$image', '$id_utilisateur');");
}