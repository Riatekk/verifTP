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

$res = $requete->modificationEleves($_REQUEST['id'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['classe'],$_REQUEST['mail'],$_REQUEST['trigramme']);

if($res)
{
    header("Location: ../view/ALE_page_gestUtil.php?notif=3");
}
else
{
    //header("Location: ../view/ALE_page_gestUtil.php?notif=4");
}
exit;
?>