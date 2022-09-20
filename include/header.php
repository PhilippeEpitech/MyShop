<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">My Shop</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a href="/crud/dashboard.php" class="nav-item nav-link active">ADMIN</a>
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