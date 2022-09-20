<?php
session_start();

require_once 'connect.php';

const ERROR_REQUIRED = "Veuillez renseigner ce champ.";
const ERROR_PASSLENGTH = "Le password contient entre 2 et 4 caractères";
const ERROR_EMAIL = "l'email n'est pas valide";
const CONNECT = "ACCESS GRANTED";
const DENIED = "ACCESS DENIED";

$errors = [
    'email' => '',
    'password' => '',
    'connect' => '',
    'denied' => ''
];

if (!empty($_POST) && isset($_POST)) {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

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

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $sql = "SELECT * FROM `users` WHERE (`email` = :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue("email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();

        if (password_verify($password, $user['password'])) {
            $errors['connect'] = CONNECT;

            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['username'],
                'email' => $user['email'],
                'admin' => $user['admin']
            ];
        } else {
            $errors['denied'] = DENIED;
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

    <title>Connexion</title>

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
                <h2 class="text-center">Connexion</h2>
                <h3><?= $errors['connect'] ? '<p class="success">' . $errors['connect'] . "</p>" : '' ?></h3>
                <h3><?= $errors['denied'] ? '<p class="alarm">' . $errors['denied'] . "</p>" : '' ?></h3>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" autocomplete="off">
                    <?= $errors['email'] ? '<p class="alarm">' . $errors['email'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" autocomplete="off">
                    <?= $errors['password'] ? '<p class="alarm">' . $errors['password'] . "</p>" : '' ?>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">connexion</button>
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

    </div>

   

</body>

</html>