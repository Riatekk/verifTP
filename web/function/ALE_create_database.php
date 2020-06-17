<?php

include '../class/ALE_Class_GestBD.php';
include '../class/ALE_Class_GestXML.php';

use GestBD\ConnexionBD;
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

$chemin = "../../sql/database/ale_veriftp.sql";
$myfile = fopen($chemin, "r");
$sql = fread($myfile, filesize($chemin));

$sql = explode(";",$sql);

//Calcul de la taille de la liste
$size = sizeof($sql) - 1;

//Suppression de la dernière ligne qui est vide et génère une erreur
unset($sql[$size]);

foreach($sql as $sql){
    //echo '<br/>';
    $res = $conn->envoiBDScript($sql);
    //echo $sql;
}

fclose($myfile);

/*
$myfile = fopen("../../sql/database/ale_veriftp_table_eleves.sql", "r");
$sql = fread($myfile, filesize("../../sql/database/ale_veriftp_table_eleves.sql"));
fclose($myfile);
*/


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