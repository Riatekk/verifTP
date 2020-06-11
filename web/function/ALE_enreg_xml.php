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
 * On définie la valeur des variables
 */
$xml->setIp($_REQUEST['IP']);
$xml->setBDName($_REQUEST['BDNom']);
$xml->setUtilisateur($_REQUEST['Utilisateur']);
$xml->setMotDePasse($_REQUEST['MDP']);

/**
 * On déclenche la sauvegarde
 */
$xml->sauvegardeFichierXML();

if(file_exists($cheminXML))
{
    header("Location: ../view/ALE_page_gestUtil.php?notif=7");
}
else
{
    header("Location: ../view/ALE_page_gestUtil.php?notif=8");
}

?>