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
/*
$myfile = fopen("../../sql/database/ale_veriftp_database.sql", "r");
$sql = fread($myfile, filesize("../../sql/database/ale_veriftp_database.sql"));

$res = $conn->creationBaseDeDonnées($sql);

fclose($myfile);
*/
$chemin = "../../sql/database/ale_veriftp.sql";
$myfile = fopen($chemin, "r");
$sql = fread($myfile, filesize($chemin));

$sql = explode(";",$sql);

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