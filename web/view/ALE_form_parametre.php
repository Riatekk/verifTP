<?php
include '../class/ALE_Class_GestXML.php';

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

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'ALE_view_scriptJSlinkCSS.inc.php' ?>
    <title>Parametre du site</title>
</head>

<body>
    <?php
    include 'ALE_view_navBar.inc.php';
    ?>
    <div class="container">

        <form class="needs-validation" action="../function/ALE_enreg_xml.php" method="get" novalidate>
            <h1 class="mt-3">Information sur la base de données</h1>
            <div class="form-group">
                <label for="ip">Adresse IP</label>
                <input type="ip" class="form-control" placeholder="Indiquez l'adresse IP de la base de données" id="IP" name="IP" value="<?php echo $AddrIP; ?>" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner l'adresse IP de la base de données</div>

            </div>
            <div class="form-group">
                <label for="dbname">Nom de la base de données</label>
                <input type="dbname" class="form-control" placeholder="Indiquez le nom de la base de données" id="BDNom" name="BDNom" value="<?php echo $BDnom; ?>" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le nom de la base de données</div>

            </div>
            <h1 class="mt-3">Information sur l'utilisateur</h1>
            <label for="uti">Nom de l'utilisateur</label>
            <div class="form-group">

                <input type="user" class="form-control" placeholder="Indiquez le nom de l'utlisateur" id="Utilisateur" name="Utilisateur" value="<?php echo $Utilisateur; ?>" required>

                <div class="valid-feedback">Valide</div>
                <div class="invalid-feedback">Renseigner le nom de l'utilisateur</div>

            </div>
            <div class="form-group">
                <label for="pwd">Mot de passe</label>
                <input type="password" class="form-control" placeholder="Indiquez le mot de passe" id="MDP" name="MDP" value="<?php echo $MotDePasse; ?>">

            </div>
            <button type="submit" class="btn btn-success">Enregistrer</button>

        </form>
        
        <a class="mt-3 btn btn-primary" href="../function/ALE_create_database.php">Insérer la base de données</a>
    </div>
</body>

</html>