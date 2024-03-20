<?php
require_once "../assets/pdo.php";
require_once "fonction.php";

if($_GET ["id"] > count($films) or $_GET ["id"] == null) {
    header(header:"Location: ./index.php");
}elseif ($_GET ["id"] == 0){
    $id=$_GET["id"];
} elseif(!empty($_GET["id"])){
    $id=$_GET["id"];
}

head();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title><?php echo($titres[$id]);?></title>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center text-primary text-bg-secondary"><?php echo($titres[$id]);?></h1>
</div>

<div class="container text-center mt-5">
    <div class="row row-gap-4">
        <img class="col col-12 col-lg-4 border py-2" src="<?php echo($images[$id]);?>" alt="affiche">
        <div class="col col-12 col-lg-8 border">
            <div class="row row-cols-3 py-5 row-gap-5">
                <div class="col fs-4">
                    <p class="mx-auto"> <i class="bi bi-airplane-fill"></i> <?php echo $pays[$id]; ?> </p>
                </div>
                <div class="col fs-4">
                    <p class="mx-auto"> <i class="bi bi-calendar-event"></i> <?php echo "$jours[$id] / $mois[$id] / $annees[$id]"; ?> </p>
                </div>
                <div class="col fs-4">
                    <p class="mx-aut"> <i class="bi bi-hourglass-split"></i>
                        <?php
                        echo gmdate("H \h i", $durees[$id] * 60);
                        ?>
                    </p>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="text-center text-primary text-bg-secondary mt-3"><i class="bi bi-file-text-fill"></i> Résumé</h3>
                    <p class="text-start fs-4"><?php echo($resumes[$id]);?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

