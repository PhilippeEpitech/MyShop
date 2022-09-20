<?php
session_start();

require_once 'connect.php';

require_once 'commandes.php';

if ($_SESSION['user']['admin'] == 0) {
    header('Location: index.php');
}


if (isset($_POST['valider'])) {

    if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['category'])) {
        if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_POST['image']) && !empty($_POST['category'])) {

            $name = htmlspecialchars(strip_tags($_POST['name']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            $desc = htmlspecialchars(strip_tags($_POST['desc']));
            $img = htmlspecialchars(strip_tags($_POST['image']));
            $cat = htmlspecialchars(strip_tags($_POST['category']));

            try {
                ajouter($name, $price, $desc, $img, $cat);
                header('Location: afficher.php');
            } catch (Exception $e) {
                var_dump($e->getMessage());
            }
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Ajouter un produit</title>
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
                            <a class="nav-link" aria-current="page" href="afficher.php">Afficher</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="#">Ajouter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="editer.php">Modifier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="supprimer.php">Supprimer</a>
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
                            <label class="form-label">Nom du produit:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prix du produit:</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description du produit:</label>
                            <textarea class="form-control" name="description" required></textarea>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image du produit:</label>
                            <input type="text" class="form-control" name="image" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category: Chaussure=1 | Sweat-shirt=2 | Tee-shirt=3</label>
                            <input type="text" class="form-control" name="category" required>
                        </div>

                        <button type="submit" name="valider" class="btn btn-success">Ajouter un nouveau produit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>