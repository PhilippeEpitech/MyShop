<?php
session_start();

require_once 'connect.php';

const ERROR_REQUIRED = "Veuillez renseigner ce champ.";
const ERROR_LENGTH = "Le pseudo contient entre 4 et 8 caractères";
const ERROR_PASSLENGTH = "Le password contient entre 2 et 4 caractères";
const ERROR_EMAIL = "l'email n'est pas valide";
const ERROR_PASSWORD = "Les password sont differents";
const SUCCESS = "Vous êtes enregistré";

$errors = [
    'pseudo' => '',
    'email' => '',
    'password' => '',
    'password_retype' => '',
    'success' => ''
];

if (!empty($_POST) && isset($_POST)) {

    $username = $_POST['pseudo'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_retype = $_POST['password_retype'] ?? '';

    if (!$username) {
        $errors['pseudo'] = ERROR_REQUIRED;
    } elseif (mb_strlen($username) < 4 || mb_strlen($username) > 8) {
        $errors['pseudo'] = ERROR_LENGTH;
    };

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL;
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 2 || mb_strlen($password) > 4) {
        $errors['password'] = ERROR_PASSLENGTH;
    }

    if (!$password_retype) {
        $errors['password_retype'] = ERROR_REQUIRED;
    } elseif ($password !== $password_retype) {
        $errors['password_retype'] = ERROR_PASSWORD;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`(`username`, `password`, `email`) VALUES (:pseudo, :pass, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue("pseudo", $username, PDO::PARAM_STR);
        $stmt->bindValue("email", $email, PDO::PARAM_STR);
        $stmt->bindValue("pass", $hash, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt) {
            $errors['success'] = SUCCESS;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <title>registration</title>

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
                    <div class="navbar-nav">
                        <?php if (isset($_SESSION['user'])) : ?>
                            <h2 class="text-white"><?= "Bienvenue " . $_SESSION['user']['pseudo'] ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="login-form">
            <form method="post" action="">
                <h2 class="text-center">Inscription</h2>
                <h3><?= $errors['success'] ? '<p class="success">' . $errors['success'] . "</p>" : '' ?></h3>

                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" autocomplete="off">
                    <?= $errors['pseudo'] ? '<p class="alarm">' . $errors['pseudo'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off">
                    <?= $errors['email'] ? '<p class="alarm">' . $errors['email'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" autocomplete="off">
                    <?= $errors['password'] ? '<p class="alarm">' . $errors['password'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" autocomplete="off">
                    <?= $errors['password_retype'] ? '<p class="alarm">' . $errors['password_retype'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>
            </form>
        </div>

        <style>
            .login-form {
                width: 340px;
                margin: 50px auto;
            }

            .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }

            .login-form h2 {
                margin: 0 0 15px;
            }

            .form-control,
            .btn {
                min-height: 38px;
                border-radius: 2px;
            }

            .btn {
                font-size: 15px;
                font-weight: bold;
            }
        </style>
</body>

</html>