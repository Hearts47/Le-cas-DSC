<?php require_once 'visite.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Gestion des pompiers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="index.php">🚒 DSC Pompiers</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                <!-- adapte le nom de ton fichier de formulaire -->
                <li class="nav-item"><a class="nav-link" href="formulaire.php">Ajout pompier</a></li>
            </ul>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        <h1>Gestion des pompiers</h1>
        <p class="lead">Bienvenue sur l'application de gestion des sapeurs-pompiers.</p>
        <a href="formulaire.php" class="btn btn-danger">Ajouter un pompier</a>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <?= htmlspecialchars($messageVisite) ?>
    </footer>

</body>
</html>