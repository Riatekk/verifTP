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

/**
 * Si un numéro de nofication et présent dans URL 
 * alors on inclut la page de gestion des notifications.
 */
if (!empty($_REQUEST['notif'])) {
    include 'ALE_view_notif.inc.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'ALE_view_scriptJSlinkCSS.inc.php' ?>
    <title>Erreur</title>
</head>

<body>
    <?php
    include 'ALE_view_navBar.inc.php';
    ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1>Status des connexions</h1>
            <?php
            if ($conn->testConnexionUtilisateur()) 
            {
                echo '<img class="bg-success rounded" src="../../icon/check.svg" alt="Connexion établie"> Utilisateur<br/>' ;

                if ($conn->connexion()) {
                    echo '<img class="bg-success rounded" src="../../icon/check.svg" alt="Connexion établie"> Base de données <br/>';
                } 
                else 
                {
                    echo '<img class="bg-danger rounded" src="../../icon/exclamation-square.svg" alt="Connexion établie"> Erreur Base de données <br/>';
                }

            } 
            else 
            {
                echo '<img class="bg-danger rounded" src="../../icon/exclamation-square.svg" alt="Connexion établie"> Erreur Utilisateur <br/>';
            }

            ?>
            <br/>
            <p>Modifier les parametres de la base de données pour corriger les problèmes
                <br />
                <a class="btn btn-primary btn-lg mt-3 btn-block" href="ALE_form_parametre.php">Paramètre de la base de données</a>
            </p>
        </div>
    </div>
</body>

</html>