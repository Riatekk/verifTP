<?php

include '../class/ALE_Class_GestBD.php';
include '../class/ALE_Class_GestXML.php';

use GestBD\ConnexionBD;
use GestBD\RequeteBD;
use GestXML\FichierXML;
use SimpleXMLElement;

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

if (empty($_FILES["file"])) {
    $res = $requete->insertionEleves($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['classe']);
} else {
    //definition du chemin de destination du fichier
    $destinationFichierCSV = "../../data/tmp/";
    $cheminFichierCSV = $destinationFichierCSV . basename($_FILES["file"]["name"]);
    
    //Enregistrement du fichier dans un dossier temporaire
    move_uploaded_file($_FILES["file"]["tmp_name"], $cheminFichierCSV);


    $monFichierCSV = fopen($cheminFichierCSV, "r");
    $donnéesFichierCSV = fread($monFichierCSV,filesize($cheminFichierCSV));

     //Séparation des éleves dans une liste grace au retour a la ligne
    $liste = explode("\n",$donnéesFichierCSV);
    
    //Calcul de la taille de la liste
    $size = sizeof($liste) - 1;

    //Suppression de la dernière ligne qui est vide et génère une erreur
    unset($liste[$size]);

    //Pour chaque élève on l'insert dans la base de données
    foreach($liste as $objetCourant){
        $eleves = explode(";",$objetCourant);

        //On supprimer les retours à la ligne
        $nom = str_replace("\r", "", $eleves[0]);
        $prenom = str_replace("\r", "", $eleves[1]);

        $res = $requete->insertionEleves($nom, $prenom, $_REQUEST['classe']);
    }

    //On ferme le fichier CSV
    fclose($monFichierCSV);
    //On supprime le fichier
    unlink($cheminFichierCSV);
}


if($res)
{
    header("Location: ../view/ALE_page_gestUtil.php?notif=1");
}
else
{
    header("Location: ../view/ALE_page_gestUtil.php?notif=2");
}

exit;
?>