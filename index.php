<?php
session_start();

require_once 'connect.php';

require_once 'commandes.php';

$mesProduits = afficher();

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Landing Page</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            /* -color: rgbackgroundba(0, 0, 0, .1); */
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">My Shop</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse row justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="afficher.php" class="nav-item nav-link active">ADMIN</a>
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['user'])) : ?>
                            <a href="signin.php" class="nav-item nav-link active">Connexion</a>
                            <a href="signup.php" class="nav-item nav-link active">Enregistrement</a>
                        <?php else : ?>
                            <a href="logout.php" class="nav-item nav-link active">Déconnexion</a>
                        <?php endif; ?>
                    </div>
            
                    <div class="navbar-nav ">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <h2 class="text-white float-end"><?= "Bienvenue " . $_SESSION['user']['pseudo'] ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    </div>
    </nav>

    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php foreach ($mesProduits as $produit) : ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <h4><?= $produit['name'] ?></h4>
                                <img src="<?= $produit['photo'] ?>" style="width: 100%">

                                <div class="card-body">
                                    <p class="card-text"><?= substr($produit['description'], 0, 110); ?>...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="produit.php?pdt=<?= $produit['id'] ?>"><button type="button" class="btn btn-sm btn-success">Voir plus</button></a>
                                        </div>
                                        <small class="text" style="font-weight: bold;"><?= $produit['price'] ?> €</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>

    </main>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>