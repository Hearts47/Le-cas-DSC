<?php

require_once 'connexion.php';

$stmt = $pdo->query(
    "SELECT idtypeengin, libengincol
     FROM TypeEngin
     ORDER BY idtypeengin"
);

$typesEngins = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Types d'engins - DSC</title>

    <!-- Bootstrap 5.3.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body class="bg-light">

    <main class="container py-5">

        <h1 class="mb-2">Types d'engins</h1>

        <p class="text-secondary mb-4">
            Liste des différents types d'engins de la caserne.
        </p>

        <?php if (count($typesEngins) > 0): ?>

            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">

                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Libellé</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($typesEngins as $engin): ?>
                                    <tr>
                                        <td>
                                            <strong>
                                                <?= htmlspecialchars($engin['idtypeengin']) ?>
                                            </strong>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($engin['libengincol']) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        <?php else: ?>

            <div class="alert alert-info">
                Aucun type d'engin n'a été trouvé.
            </div>

        <?php endif; ?>

    </main>

</body>

</html>