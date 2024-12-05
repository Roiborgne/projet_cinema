<?php

require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/database/base_utilisateurs.php';
require_once BASE_PROJET .'/src/database/base_films.php';

head();

if (!isset($_SESSION["utilisateur"])){
    header(header:"Location: ./index.php");
    //403 forbiden
}else{
    $pdo=connexion();

    $email = $_SESSION["utilisateur"]["email"];

    $titre = "";
    $resume = "";
    $duree = "";
    $date = "";
    $pays = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
//Le formulaire est soumis !
//Traiter les données du formulaire
//Récuperer les valeurs saisis de l'utilisateur
//superglobale $_POST : tableaux assoc
        $titre = $_POST ["titre"];
        $duree = $_POST ["duree"];
        $resume = $_POST ["resume"];
        $date = $_POST ["date"];
        $pays = $_POST ["pays"];
        $image = $_POST ["image"];


//Validification des données
        $erreurs = [];
//email
        if (empty($titre)) {
            $erreurs["titre"] = "Le titre est obligatoire";

        }if (empty($duree)) {
            $erreurs["duree"] = "La durée est obligatoire";

            //mdp
        }if (empty($resume)) {
            $erreurs["resume"] = "Le résumé est obligatoire";

        }if (empty($date)) {
            $erreurs["date"] = "La date est obligatoire";

        }if (empty($pays)) {
            $erreurs["pays"] = "Le pays est obligatoire";

        }if (empty($image)) {
            $erreurs["image"] = "L'image est obligatoire";

        }


//Traiter les données
        if (empty($erreurs)) {
            //fonction insérer dans film
            $id_utilisateur = recupUtilisateur($email);
            $id_utilisateur = $id_utilisateur[0];
            $id_utilisateur = $id_utilisateur["id_utilisateur"];
            ajoutFilm($titre, $duree, $resume, $date, $pays, $image, $id_utilisateur);
        }
    }
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Cinemathèque</title>
</head>
<body>

<div class="container">
    <h1 class="text-center text-primary text-bg-secondary mt-3">Ajoutez un films</h1>
    <form action="" method="post" class="w-50 mx-auto p-4 my-5 shadow bg-dark">

        <div class="mb-3">
            <label class="form-label" for="titre">Titre*</label>
            <input
                type="text"
                class="form-control <?php if(isset($erreurs["titre"])) echo("border border-danger border-3")?>"
                id="titre"
                name="titre"
            >

            <?php if (isset($erreurs["titres"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["titre"]) ?></p>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="duree">Durée (en minute)*</label>
            <input
                type="number"
                class="form-control <?php if(isset($erreurs["durée"])) echo("border border-danger border-3")?>"
                id="duree"
                name="duree"
            >

            <?php if (isset($erreurs["durée"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["durée"]) ?></p>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="resume">Résumé*</label>
            <input
                type="text"
                class="form-control <?php if(isset($erreurs["resume"])) echo("border border-danger border-3")?>"
                id="resume"
                name="resume"
            >

            <?php if (isset($erreurs["resumee"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["resumee"]) ?></p>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="date">Date*</label>
            <input
                type="date"
                class="form-control <?php if(isset($erreurs["date"])) echo("border border-danger border-3")?>"
                id="date"
                name="date"
            >

            <?php if (isset($erreurs["date"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["date"]) ?></p>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="pays">Pays*</label>
            <input
                type="text"
                class="form-control <?php if(isset($erreurs["pays"])) echo("border border-danger border-3")?>"
                id="pays"
                name="pays"
            >

            <?php if (isset($erreurs["pays"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["pays"]) ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="image">Image (url)*</label>
            <input
                    type="text"
                    class="form-control <?php if(isset($erreurs["image"])) echo("border border-danger border-3")?>"
                    id="image"
                    name="image"
            >

            <?php if (isset($erreurs["image"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["image"]) ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

<script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>