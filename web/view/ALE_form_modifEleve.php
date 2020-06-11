<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'ALE_view_scriptJSlinkCSS.inc.php' ?>

    <title>modifier un élève</title>
</head>

<body>
    <?php
    include 'ALE_view_navBar.inc.php';
    ?>

    <div class="jumbotron">
        <div class="text-center">
            <h1>Modification d'un élève</h1>
            <p>L'élève apparaîtra ensuite dans la liste des élèves avec les modifications</p>
        </div>
    </div>

    <div class="container">
        <a href="ALE_page_gestUtil.php" class="btn btn-info mb-4">Retour</a>
        <form class="needs-validation" action="../function/ALE_update_eleves.php" method="get" novalidate>
            <div class="form-group">

                <label for="id" name="">Identifiant numéro :</label>
                <input type="id" class="form-control bg-secondary text-white" style="pointer-events: none;" name="id" id="id" value="<?php echo $_REQUEST['id'] ?>">

                <br />
                <label for="email">Nom</label>
                <input type="nom" class="form-control" placeholder="Indiquez le nom de l'élève" id="nom" name="nom" value="<?php echo $_REQUEST['nom'] ?>" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le nom de l'élève</div>

            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="prenom" class="form-control" placeholder="Indiquez le prenom de l'élève" id="prenom" name="prenom" value="<?php echo $_REQUEST['prenom'] ?>" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le prenom de l'élève</div>

            </div>
            <div class="form-group">
                <label for="classe" class="mr-sm-2">Classe</label>
                <select class="form-control " name="classe" id="classe">
                    <option value="1SIO">1SIO</option>
                    <option value="2SIO">2SIO</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
</body>

</html>