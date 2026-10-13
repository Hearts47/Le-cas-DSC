<?php

require_once 'connexion.php';

$erreurs = [];
$code = '';
$libelle = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = strtoupper(trim($_POST['idtypeengin'] ?? ''));
    $libelle = trim($_POST['libengincol'] ?? '');

    if ($code === '') {
        $erreurs[] = "Le code est obligatoire.";
    } elseif (strlen($code) > 10) {
        $erreurs[] = "Le code ne doit pas dépasser 10 caractères.";
    }

    if (strlen($libelle) > 100) {
        $erreurs[] = "Le libellé ne doit pas dépasser 100 caractères.";
    }

    if (empty($erreurs)) {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO TypeEngin (idtypeengin, libengincol)
                 VALUES (:code, :libelle)"
            );

            $stmt->execute([
                'code' => $code,
                'libelle' => $libelle !== '' ? $libelle : null
            ]);

            header('Location: typesEngin.php?ajout=ok');
            exit;

        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $erreurs[] = "Ce code existe déjà.";
            } else {
                $erreurs[] = "Une erreur est survenue lors de l'ajout.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un type d'engin - DSC</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<main class="container py-5">

    <h1 class="mb-4">Ajouter un type d'engin</h1>

    <?php foreach ($erreurs as $erreur): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($erreur) ?>
        </div>
    <?php endforeach; ?>

    <form method="post" class="card card-body shadow-sm">

        <div class="mb-3">
            <label for="idtypeengin" class="form-label">Code de l'engin</label>

            <input
                type="text"
                class="form-control"
                id="idtypeengin"
                name="idtypeengin"
                maxlength="10"
                required
                value="<?= htmlspecialchars($code) ?>"
            >

            <div class="form-text">Exemple : EPA, FPT ou VSAV.</div>
        </div>

        <div class="mb-3">
            <label for="libengincol" class="form-label">Libellé</label>

            <input
                type="text"
                class="form-control"
                id="libengincol"
                name="libengincol"
                maxlength="100"
                value="<?= htmlspecialchars($libelle) ?>"
            >
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                Ajouter
            </button>

            <a href="typesEngin.php" class="btn btn-secondary">
                Retour
            </a>
        </div>

    </form>

</main>

</body>
</html>