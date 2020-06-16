<?php

include '../class/ALE_Class_GestBD.php';
include '../class/ALE_Class_GestXML.php';

use GestBD\ConnexionBD;
use GestBD\RequeteBD;
use GestXML\FichierXML;

/**
 * Création d'un objet pour accédé aux informations de 
 * la base de données enregistré dans un XML.
 */
$cheminXML = '../../data/file.xml';
$xml = new FichierXML($cheminXML);

/**
 * Récupération des informations enregistré concernant 
 * la base de données dans le fichier XML 'data/file.xml'.
 */
$AddrIP = $xml->getIp();
$BDnom = $xml->getBDName();
$Utilisateur = $xml->getUtilisateur();
$MotDePasse = $xml->getMotDePasse();

/**
 * Création des objets de connexion a la base de données 
 * et de requètage.
 */
$conn = new ConnexionBD($AddrIP, $BDnom, $Utilisateur, $MotDePasse);
$requete = new RequeteBD($conn);
?>


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
                    <?php
                    foreach ($requete->listeClasse() as $classe) {
                        echo '<option value="' . $classe['id'] . '">' . $classe['classe_libelle'] . '</option>';
                    }
                    ?>
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
                    <?php
                    foreach ($requete->listeClasse() as $classe) {
                        echo '<option value="' . $classe['id'] . '">' . $classe['classe_libelle'] . '</option>';
                    }
                    ?>
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