<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ALE_RechercheAvancee.js"></script>
    <script src="../js/ALE_VerificationChampFormulaire.js"></script>
    <title>Ajouter un élève</title>
</head>

<body>
    <?php
    include 'view/ALE_view_navBar.php';
    ?>
    <div class="jumbotron">
        <div class="text-center">
            <h1>Ajouter un élève</h1>
            <p>L'élève apparaîtra ensuite dans la liste des élèves</p>
        </div>
    </div>

    <div class="container">
    <a href="ALE_page_gestUtil.php" class="btn btn-info mb-4">Retour</a>
        <form class="needs-validation" action="function/ALE_insert_eleves.php" method="get" novalidate>
            <div class="form-group">
                <label for="email">Nom</label>
                <input type="nom" class="form-control" placeholder="Indiquez le nom de l'élève" id="nom" name="nom" value="" required>
                
                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le nom de l'élève</div>

            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="prenom" class="form-control" placeholder="Indiquez le prenom de l'élève" id="prenom" name="prenom" value="" required>
                
                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le prenom de l'élève</div>
                
            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            
        </form>
    </div>
</body>
</html>