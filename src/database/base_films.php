<?php

function recupFilms(): array
{
    $pdo = connexion();
    $films = $pdo->query("SELECT * FROM film");
    return $films->fetchAll(PDO::FETCH_ASSOC);
}


function recupDetails($nom): array
{
    $pdo = connexion();
    $details = $pdo->query("SELECT * FROM film WHERE id = $nom ");
    return $details->fetch(PDO::FETCH_ASSOC);
}