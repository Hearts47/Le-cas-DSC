<?php

require_once 'connexion.php';

// Récupérer les types d'engins depuis la base de données
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
</head>

<body>

    <h1>Liste des types d'engins</h1>

    <?php if (count($typesEngins) > 0): ?>

        <table border="1">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Libellé</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($typesEngins as $engin): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($engin['idtypeengin']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($engin['libengincol']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>

        <p>Aucun type d'engin n'a été trouvé.</p>

    <?php endif; ?>

</body>

</html>