<?php

// Tableau pour stocker les erreurs
$erreurs = [];

// Récupération des données envoyées (avec valeur par défaut vide si absent)
$matricule       = $_POST['matricule'] ?? '';
$dateNaissance   = $_POST['dateNaissance'] ?? '';
$nom             = trim($_POST['nom'] ?? '');
$prenom          = trim($_POST['prenom'] ?? '');
$sexe            = $_POST['sexe'] ?? '';
$grade           = $_POST['grade'] ?? '';
$telephone       = trim($_POST['telephone'] ?? '');
$caserne         = $_POST['caserne'] ?? '';
$typePompier     = $_POST['typePompier'] ?? '';

// --- Matricule : obligatoire, entier positif ---
if ($matricule === '') {
    $erreurs[] = "Le matricule est obligatoire";
} elseif (!ctype_digit($matricule)) {
    $erreurs[] = "Le matricule doit être un nombre entier";
}

// --- Date de naissance : obligatoire, format valide ---
if ($dateNaissance === '') {
    $erreurs[] = "La date de naissance est obligatoire";
} else {
    $d = DateTime::createFromFormat('Y-m-d', $dateNaissance);
    if (!$d || $d->format('Y-m-d') !== $dateNaissance) {
        $erreurs[] = "La date de naissance n'est pas valide";
    }
}

// --- Nom ---
if ($nom === '') {
    $erreurs[] = "Le nom du pompier est obligatoire";
}

// --- Prénom ---
if ($prenom === '') {
    $erreurs[] = "Le prénom du pompier est obligatoire";
}

// --- Sexe : obligatoire, valeur parmi une liste autorisée ---
$sexesValides = ['féminin', 'masculin'];
if ($sexe === '') {
    $erreurs[] = "Le sexe du pompier est obligatoire";
} elseif (!in_array($sexe, $sexesValides, true)) {
    $erreurs[] = "Le sexe du pompier n'est pas valide";
}

// --- Grade : obligatoire, doit correspondre à un id existant (1 à 13 ici) ---
$gradesValides = range(1, 13);
if ($grade === '') {
    $erreurs[] = "Le grade est obligatoire";
} elseif (!ctype_digit($grade) || !in_array((int)$grade, $gradesValides, true)) {
    $erreurs[] = "Le grade sélectionné n'est pas valide";
}

// --- Téléphone : facultatif, mais si rempli, doit faire 10 chiffres ---
if ($telephone !== '' && !preg_match('/^[0-9]{10}$/', $telephone)) {
    $erreurs[] = "Le téléphone doit contenir 10 chiffres";
}

// --- Caserne : obligatoire, doit correspondre à un id existant (1 à 3 ici) ---
$casernesValides = [1, 2, 3];
if ($caserne === '') {
    $erreurs[] = "La caserne est obligatoire";
} elseif (!ctype_digit($caserne) || !in_array((int)$caserne, $casernesValides, true)) {
    $erreurs[] = "La caserne sélectionnée n'est pas valide";
}

// --- Type pompier : obligatoire, valeur parmi une liste autorisée ---
$typesValides = ['professionnel', 'volontaire'];
if ($typePompier === '') {
    $erreurs[] = "Le type de pompier est obligatoire";
} elseif (!in_array($typePompier, $typesValides, true)) {
    $erreurs[] = "Le type de pompier n'est pas valide";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Résultat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">

<?php if (empty($erreurs)): ?>

    <div class="alert alert-success">OK</div>

<?php else: ?>

    <div class="alert alert-danger">
        <strong>Le formulaire contient des erreurs :</strong>
        <ul class="mb-0">
            <?php foreach ($erreurs as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<a href="formulaire.html" class="btn btn-secondary">Retour au formulaire</a>

</div>
</body>
</html>