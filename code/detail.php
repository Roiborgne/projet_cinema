<?php
require_once "../assets/pdo.php";
require_once "fonction.php";

if ($_GET ['nom'] == 0){
    $nom=$_GET['nom'];
} elseif(!empty($_GET['nom'])){
    $nom=$_GET['nom'];
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

    <title><?php echo($titres[$nom]);?></title>
</head>
<body>

<div class="container mt-3">
    <h1 class="text-center text-primary text-bg-secondary"><?php echo($titres[$nom]);?></h1>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col border">
            <img class="d-block w-75 h-75 my-5 mx-auto" src="<?php echo($images[$nom]);?>" alt="affiche">
        </div>
        <div class="col align-middle text-center border ">
            <div><p class="mx-auto text-decoration-underline"><?php echo "pays :" ?> </p>
                <p class="mx-auto">
                    <?php echo ($pays[$nom]); ?>
                </p>
            </div>
            <div>
                <p class="mx-auto text-decoration-underline"><?php echo "date :" ?> </p>
                <p class="mx-auto">
                    <?php echo ($dates[$nom]); ?>
                </p>
            </div>
            <div>
                <p class="mx-auto text-decoration-underline"><?php echo "durées :" ?> </p>
                <p class="mx-auto">
                    <?php $seconds = $durees[$nom]*60;
                    echo gmdate("H \h i", $seconds); ?>
                </p>
            </div>
            <div class="container mt-3">
                <h3 class="text-center text-primary text-bg-secondary mt-3">Résumé</h3>
                <p class="text-start"><?php echo($resumes[$nom]);?></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

