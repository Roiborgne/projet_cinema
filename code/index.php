<?php
require_once "../assets/pdo.php";
require_once "fonction.php";

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

    <title>Cinemathèque</title>
</head>
<body>

<div class = "container mt-2" >
    <h1 class="text-primary text-bg-secondary">Dernier ajouts</h1>
    <div id="carousel" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo($images[count($films)-1]);?>" class="d-block w-100  h-75" alt="1">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo($titres[count($films)-1]);?></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo($images[count($films)-2]);?>" class="d-block w-100 h-75" alt="2">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo($titres[count($films)-2]);?></h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo($images[count($films)-3]);?>" class="d-block w-100 h-75" alt="3">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo($titres[count($films)-3]);?></h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container text-center mt-3">
    <h1 class="text-start text-primary text-bg-secondary">Tous les films</h1>
    <div class="row row-cols-auto">
        <?php for ($i = 0; $i < count($films); $i++) {?>
        <div class="card col m-4" style="width: 18rem;">
            <img src="<?php echo($images[$i]);?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-danger"><?php echo($titres[$i]);?> </h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <?php $seconds = $durees[$i]*60;
                    echo "durée : ".gmdate("H : i", $seconds); ?>
                </li>
            </ul>
            <div class="card-body">
                <?php
                echo ('<a href="./detail.php?nom='.$i.'" class="card-link">Détail</a>');
                ?>

            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
