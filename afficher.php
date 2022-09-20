<?php
session_start();

require_once 'connect.php';

require_once 'commandes.php';

if ($_SESSION['user']['admin'] == 0) {
    header('Location: index.php');
}

$produits = afficher();

?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Afficher un article</title>
</head>

<body>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary d-flex" href="index.php">Quitter Admin</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="#">Afficher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ajouter.php">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="editer.php">Modifier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="supprimer.php">Supprimer</a>
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

                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">nom</th>
                                <th scope="col">prix</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Editer</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($produits as $produit) : ?>
                                <tr>
                                    <th scope="row"><?= $produit['id'] ?></th>
                                    <td>
                                        <img src="<?= $produit['photo'] ?>" style="width: 25%">
                                    </td>
                                    <td style="font-weight: bold"><?= $produit['name'] ?></td>
                                    <td style="font-weight: bold; color: green;"><?= $produit['price'] ?>€</td>
                                    <td><?= substr($produit['description'], 0, 80); ?>.....</td>
                                    <td><?= $produit['category_id'] ?></td>
                                    <td>
                                        <a href="editer.php?pdt=<?= $produit['id'] ?>"><img src="https://img.icons8.com/arcade/64/000000/experimental-edit-arcade.png" /></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>