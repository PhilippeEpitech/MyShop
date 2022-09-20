<?php
session_start();

require_once 'connect.php';

require_once 'commandes.php';

if ($_SESSION['user']['admin'] == 0) {
    header('Location: index.php');
}

$produits = afficher();

if (isset($_POST['valider'])) {
    if (isset($_POST['idproduit'])) {
        if (!empty($_POST['idproduit']) && is_numeric($_POST['idproduit'])) {
            $idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));

            try {
                supprimer($idproduit);
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Supprimer un article</title>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- <a class="navbar-brand" href="#">Administration</a> -->
                <a class="btn btn-primary d-flex" href="index.php">Quitter Admin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="afficher.php">Afficher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ajouter.php">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="editer.php">Modifier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="font-weight: bold;" href="#">Supprimer</a>
                        </li>
                    </ul>

                    <div style="margin-right: 500px">
                        <h1 style="color: blue;"><?= $_SESSION['user']['pseudo'] ?></h1>
                    </div>
                    <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="logout.php">Se deconnecter</a>
                </div>
            </div>
        </nav>


        <div class="album py-5 bg-light">

            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <form method="post">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="form-label">Identifiant du produit:</label>
                                <input type="number" class="form-control" name="idproduit" required>
                            </div>
                            <button type="submit" name="valider" class="btn btn-warning">Supprimer le produit</button>
                    </form>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($produits as $produit) : ?>
                        <div class="col">
                            <div class="card shadow-md">

                                <img src="<?= $produit['photo'] ?>">

                                <h3><?= $produit['id'] ?></h3>

                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>