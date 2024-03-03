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
        <table class="col align-middle text-center border ">
            <tbody>
            <tr>
                <td>
                    <p class="mx-auto text-decoration-underline"><?php echo "pays :" ?> </p>
                </td>
                <td>
                    <p class="mx-auto">
                        <?php echo ($pays[$nom]); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="mx-auto text-decoration-underline"><?php echo "date :" ?> </p>
                </td>
                <td>
                    <p class="mx-auto">
                        <?php echo ($dates[$nom]); ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="mx-auto text-decoration-underline"><?php echo "durées :" ?> </p>
                </td>
                <td>
                    <p class="mx-auto">
                        <?php $seconds = $durees[$nom]*60;
                        echo gmdate("H \h i", $seconds); ?>
                    </p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-3">
    <h3 class="text-center text-primary text-bg-secondary mt-3">Résumé</h3>
    <p class="text-start"><?php echo($resumes[$nom]);?></p>
</div>
</body>
</html>

