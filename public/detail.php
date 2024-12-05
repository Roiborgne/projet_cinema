<?php
require_once "../base.php";
require_once BASE_PROJET .'/src/config/pdo.php';
require_once BASE_PROJET .'/src/database/base_films.php';
require_once BASE_PROJET .'/src/database/base_commentaire.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/_partials/fonction.php';

if ($_GET ['id'] == 0){
    $id=$_GET['id'];
} elseif(!empty($_GET['id'])){
    $id=$_GET['id'];
}

head();

$films = recupFilms();
$details = recupDetails($id);
//$date = $details["date"];
//$details["date"] = dateFormat($date);
//$coms = recupCom($id);
//foreach ($coms as $champs) {
//    $ids [] = $champs ["id_commentaire"];
//    $titres [] = $champs ["titre"] ;
//    $avis [] = $champs ["avis"] ;
//    $notes [] = $champs ["notes"] ;
//    $dates [] = $champs ["date"] ;
//    $id_utilisateur [] = $champs ["id_utilisateur"] ;
//    $id_film [] = $champs ["id_film"];
//}
//$dates = dateFormat($dates[$id-1]);
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
                    <p class="mx-auto"> <i class="bi bi-calendar-event"></i> <?php echo $details["date"] ?> </p>
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
                <?php //    <p class="text-end fst-italic fs-4"> <?php if ($details["id_utilisateur"] != NULL){?>
                <?php //        echo ("ajouté par ".$details["pseudo_utilisateur"]);?>
                <?php //        }else{?>
                <?php //        echo("ajouté par l'admin");?>
                <?php //        }  </p>?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center mt-5">
    <h1 class="text-center text-primary text-bg-secondary"><i class="bi bi-stars"></i>commentaires</h1>
</div>
<?php //?>
<?php // <div class="container text-start"> ?>
<?php //     <?php if (isset($_SESSION["utilisateur"])){ ?>
<?php //         echo('<a href="commentaire.php" class="btn btn-primary ">Ajouter un nouveau commentaire</a>'); ?>
<?php //     } ?>
<?php //     ?>
<?php //     <?php ?>
<?php //     for ($i = 0; $i < count($coms) ; $i++) {?>
<?php //         <div class="card my-3"> ?>
<?php //             <div class="card-header"> ?>
<?php //                 <p class="card-title text-primary "><?php echo($titres[$i]." "); ?>
<?php //                 echo (str_repeat("<i class=\"bi bi-star-fill\"></i>",$notes[$i])); </p> ?>
<?php //             </div> ?>
<?php //             <div class="card-body"> ?>
<?php //                 <p class="list-group list-group-flush"> ?>
<?php //                     <?php echo $avis[$i]; ?>
<?php //                 </p> ?>
<?php //                 <span class="fs-6 fst-italic fw-lighter">De Logan le ?>
<?php //                     <?php echo($dates) <br> ?>
<?php //                 </span> ?>
<?php //             </div> ?>
<?php //         </div> ?>
<?php //     <?php } ?>
<?php // </div> ?>
<script src="../assets/bootstrap.bundle.min.js"></script>

</body>
</html>

