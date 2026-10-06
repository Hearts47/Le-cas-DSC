<?php
session_start();

require_once 'connexion.php';

// Récupération des grades
$stmtGrade = $pdo->query("SELECT idgrade, libgrade FROM grade ORDER BY idgrade");
$grades = $stmtGrade->fetchAll(PDO::FETCH_ASSOC);

// Récupération des casernes
$stmtCaserne = $pdo->query("SELECT idcaserne, nomcaserne FROM caserne ORDER BY idcaserne");
$casernes = $stmtCaserne->fetchAll(PDO::FETCH_ASSOC);

// Récupération des anciennes données du formulaire
$donneesFormulaire = $_SESSION['formulaire'] ?? [];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajout Pompier</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

  <div class="container">
    <h1 class="mb-4">Ajout Pompier</h1>

    <form id="formPompier" method="post" action="traitement.php" novalidate>

      <div class="row mb-3">

        <div class="col-md-6">
          <label for="matricule" class="form-label">Matricule</label>

          <input
            type="number"
            class="form-control"
            id="matricule"
            name="matricule"
            placeholder="Ex : 876524"
            value="<?= htmlspecialchars($donneesFormulaire['matricule'] ?? '') ?>"
            required
            min="1"
          >

          <div class="invalid-feedback">
            Le matricule est obligatoire
          </div>
        </div>


        <div class="col-md-6">
          <label for="dateNaissance" class="form-label">Date de Naissance</label>

          <input
            type="date"
            class="form-control"
            id="dateNaissance"
            name="dateNaissance"
            value="<?= htmlspecialchars($donneesFormulaire['dateNaissance'] ?? '') ?>"
            required
          >

          <div class="invalid-feedback">
            La date de naissance est obligatoire
          </div>
        </div>

      </div>


      <div class="row mb-3">

        <div class="col-md-6">
          <label for="nom" class="form-label">Nom</label>

          <input
            type="text"
            class="form-control"
            id="nom"
            name="nom"
            value="<?= htmlspecialchars($donneesFormulaire['nom'] ?? '') ?>"
            required
          >

          <div class="invalid-feedback">
            Le nom du pompier est obligatoire
          </div>
        </div>


        <div class="col-md-6">
          <label for="prenom" class="form-label">Prénom</label>

          <input
            type="text"
            class="form-control"
            id="prenom"
            name="prenom"
            value="<?= htmlspecialchars($donneesFormulaire['prenom'] ?? '') ?>"
            required
          >

          <div class="invalid-feedback">
            Le prénom du pompier est obligatoire
          </div>
        </div>

      </div>


      <div class="row mb-3">

        <div class="col-md-6">

          <label class="form-label d-block">Sexe :</label>

          <div class="form-check form-check-inline">

            <input
              class="form-check-input"
              type="radio"
              name="sexe"
              id="sexeF"
              value="féminin"
              <?= ($donneesFormulaire['sexe'] ?? '') === 'féminin' ? 'checked' : '' ?>
              required
            >

            <label class="form-check-label" for="sexeF">
              féminin
            </label>

          </div>


          <div class="form-check form-check-inline">

            <input
              class="form-check-input"
              type="radio"
              name="sexe"
              id="sexeM"
              value="masculin"
              <?= ($donneesFormulaire['sexe'] ?? '') === 'masculin' ? 'checked' : '' ?>
              required
            >

            <label class="form-check-label" for="sexeM">
              masculin
            </label>

          </div>

          <div
            class="text-danger small"
            id="sexeError"
            style="display:none;"
          >
            Le sexe du pompier est obligatoire
          </div>

        </div>


        <div class="col-md-6">

          <label for="grade" class="form-label">
            Grade
          </label>

          <select
            class="form-select"
            id="grade"
            name="grade"
            required
          >

            <option value="" disabled
              <?= empty($donneesFormulaire['grade']) ? 'selected' : '' ?>>
              -- Choisir --
            </option>

            <?php foreach ($grades as $g): ?>

              <option
                value="<?= htmlspecialchars($g['idgrade']) ?>"
                <?= ($donneesFormulaire['grade'] ?? '') == $g['idgrade'] ? 'selected' : '' ?>
              >
                <?= htmlspecialchars($g['libgrade']) ?>
              </option>

            <?php endforeach; ?>

          </select>

          <div class="invalid-feedback">
            Le grade est obligatoire
          </div>

        </div>

      </div>


      <div class="row mb-3">

        <div class="col-md-6">

          <label for="telephone" class="form-label">
            Téléphone
          </label>

          <input
            type="tel"
            class="form-control"
            id="telephone"
            name="telephone"
            value="<?= htmlspecialchars($donneesFormulaire['telephone'] ?? '') ?>"
            pattern="^[0-9]{10}$"
            required
          >

          <div class="invalid-feedback">
            Un numéro de téléphone valide est requis
          </div>

        </div>


        <div class="col-md-6">

          <label for="caserne" class="form-label">
            Caserne
          </label>

          <select
            class="form-select"
            id="caserne"
            name="caserne"
            required
          >

            <option value="" disabled
              <?= empty($donneesFormulaire['caserne']) ? 'selected' : '' ?>>
              -- Choisir --
            </option>

            <?php foreach ($casernes as $c): ?>

              <option
                value="<?= htmlspecialchars($c['idcaserne']) ?>"
                <?= ($donneesFormulaire['caserne'] ?? '') == $c['idcaserne'] ? 'selected' : '' ?>
              >
                <?= htmlspecialchars($c['nomcaserne']) ?>
              </option>

            <?php endforeach; ?>

          </select>

          <div class="invalid-feedback">
            La caserne est obligatoire
          </div>

        </div>

      </div>


      <div class="mb-3">

        <label class="form-label d-block">
          Type pompier :
        </label>


        <div class="form-check form-check-inline">

          <input
            class="form-check-input"
            type="radio"
            name="typePompier"
            id="typePro"
            value="professionnel"
            <?= ($donneesFormulaire['typePompier'] ?? '') === 'professionnel' ? 'checked' : '' ?>
            required
          >

          <label class="form-check-label" for="typePro">
            Professionnel
          </label>

        </div>


        <div class="form-check form-check-inline">

          <input
            class="form-check-input"
            type="radio"
            name="typePompier"
            id="typeVol"
            value="volontaire"
            <?= ($donneesFormulaire['typePompier'] ?? '') === 'volontaire' ? 'checked' : '' ?>
            required
          >

          <label class="form-check-label" for="typeVol">
            Volontaire
          </label>

        </div>


        <div
          class="text-danger small"
          id="typeError"
          style="display:none;"
        >
          Le type de pompier est obligatoire
        </div>

      </div>


      <button type="submit" class="btn btn-primary">
        Valider
      </button>

      <div id="resultat" class="mt-3"></div>

    </form>

  </div>


  <script>

    const form = document.getElementById('formPompier');


    form.addEventListener('submit', function (e) {

      e.preventDefault();
      e.stopPropagation();

      form.classList.add('was-validated');


      // Vérification du sexe
      const sexeChecked =
        form.querySelector('input[name="sexe"]:checked');

      document.getElementById('sexeError').style.display =
        sexeChecked ? 'none' : 'block';


      // Vérification du type de pompier
      const typeChecked =
        form.querySelector('input[name="typePompier"]:checked');

      document.getElementById('typeError').style.display =
        typeChecked ? 'none' : 'block';


      // Si tout est valide, on envoie le formulaire
      if (form.checkValidity() && sexeChecked && typeChecked) {

        form.submit();

      } else {

        document.getElementById('resultat').innerHTML = '';

      }

    });

  </script>

</body>
</html>