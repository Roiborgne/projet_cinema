<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/database/base_films.php';

head();
$films = recupFilms();
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

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Cinemathèque</title>
</head>
<body>
<main>
    <div class="container text-center mt-3">
        <h1 class="text-start text-primary text-bg-secondary">Listes des films</h1>
        <div class="row row-cols-auto justify-content-center">
            <?php
            for ($i = 0; $i < count($films) ; $i++) {?>
                <div class="card col m-4" style="width: 18rem;">
                    <img src="<?php echo($images[$i]);?>" class="card-img-top pt-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary text-bg-dark h-100"><?php echo($titres[$i]);?> </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <?php $seconds = $durees[$i]*60;
                            echo gmdate("H", $seconds)." h ".gmdate("i", $seconds); ?>
                        </li>
                    </ul>
                    <div class="card-body">
                        <?php
                        echo ('<a href="./detail.php?id='.$films[$i]["id"].'"
                        class="btn btn-primary btn-outline-dark rounded-pill text-decoration-none border-dark">Détail</a>');
                        ?>
                        <a class="btn btn-primary btn-outline-dark rounded-pill text-decoration-none border-dark">Favoris</a>
                    </div>
                </div>
            <?php } ?>

            <nav aria-label="Page navigation example" class="col-12">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>


<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
