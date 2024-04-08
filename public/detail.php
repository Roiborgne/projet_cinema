<?php
require_once "../base.php";
require_once BASE_PROJET .'/src/config/pdo.php';
require_once BASE_PROJET .'/src/database/base_films.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/_partials/fonction.php';

if ($_GET ['nom'] == 0){
    $nom=$_GET['nom'];
} elseif(!empty($_GET['nom'])){
    $nom=$_GET['nom'];
}

head();

$films = recupFilms();
$details = recupDetails($nom);
$details["date"] = dateFormat($details);
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

    <title><?php echo($details["titre"]);?></title>
</head>
<body>

<div class="container mt-3 mb-5">
    <h1 class="text-center text-primary text-bg-secondary"><?php echo($details["titre"]);?></h1>
</div>

<div class="container text-center mt-3">
    <div class="row">
        <img class="col col-12 col-lg-4 border py-2" src="<?php echo($details["image"]);?>" alt="affiche">
        <div class="col col-12 col-lg-8 border">
            <div class="row row-cols-3 py-5 row-gap-5">
                <div class="col fs-4">
                    <p class="mx-auto"> <i class="bi bi-airplane-fill"></i> <?php echo $details["pays"]; ?> </p>
                </div>
                <div class="col fs-4">
                    <p class="mx-auto"> <i class="bi bi-calendar-event"></i> <?php echo $details["date"]["jour"]."-".$details["date"]["mois"]."-".$details["date"]["année"] ?> </p>
                </div>
                <div class="col fs-4">
                    <p class="mx-aut"> <i class="bi bi-hourglass-split"></i>
                        <?php
                        $seconds = $details["durée"] * 60;
                        echo gmdate("H \h i", $seconds);
                        ?>
                    </p>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="text-center text-primary text-bg-secondary mt-3"><i class="bi bi-file-text-fill"></i> Résumé</h3>
                    <p class="text-start fs-4"><?php echo($details["résumé"]);?></p>
                    <p class="text-end fst-italic fs-4"> <?php if ($details["id_utilisateur"] != NULL){
                        echo ("ajouté par ".$details["pseudo_utilisateur"]);
                        }else{
                        echo("ajouté par l'admin");
                        } ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

