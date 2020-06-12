<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'ALE_view_scriptJSlinkCSS.inc.php'; ?>

    <title>Ajouter un élève</title>
</head>

<body>
    <?php
    include 'ALE_view_navBar.inc.php';
    ?>
    <div class="jumbotron">
        <div class="text-center">
            <h1>Ajouter un élève</h1>
            <p>L'élève apparaîtra ensuite dans la liste des élèves</p>
        </div>
    </div>

    <div class="container">
        <a href="ALE_page_gestUtil.php" class=" btn btn-info mb-4">Retour</a>
        
        <h2>Enregistrer un élève</h2>
        <form class="needs-validation" action="../function/ALE_insert_eleves.php" method="get" novalidate>
            <div class="form-group">

                <label for="nom" class="mr-sm-2">Nom</label>
                <input type="nom" class="form-control" placeholder="Indiquez le nom de l'élève" id="nom" name="nom" value="" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le nom de l'élève</div>
            </div>
            <div class="form-group">
                <label for="prenom" class="mr-sm-2">Prenom</label>
                <input type="prenom" class="form-control " placeholder="Indiquez le prenom de l'élève" id="prenom" name="prenom" value="" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le prenom de l'élève</div>

            </div>
            <div class="form-group">
                <label for="classe" class="mr-sm-2">Classe</label>
                <select class="form-control " name="classe" id="classe">
                    <option value="1">1SIO</option>
                    <option value="2">2SIO</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>

        </form>
        <br />
        <br />
        <h2>Importer un fichier CSV</h2>
        <form class="needs-validation" action="../function/ALE_insert_eleves.php" method="post" enctype="multipart/form-data" novalidate>
            <div class="form-group">
                <label for="file" class="mr-sm-2">Fichier CSV : </label>
                <input type="file" placeholder="Selectionner le fichier" id="file" name="file">

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Sélectionner le fichier CSV</div>
            </div>
            <div class="form-group">
                <label for="classe" class="mr-sm-2">Selectionner une classe</label>
                <select class="form-control " name="classe" id="classe">
                    <option value="1">1SIO</option>
                    <option value="2">2SIO</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
        </form>
        <br />
        <br />
        <br />
        <br />

    </div>
</body>

</html>