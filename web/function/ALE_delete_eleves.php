<?php
include '../class/ALE_bibli_gestBD.php';

use GestBD\ConnexionBD;
use GestBD\RequeteBD;

$conn = new ConnexionBD('127.0.0.1', 'ale_veriftp', 'root', '');
$requete = new RequeteBD($conn);

$res = $requete->supprimerEleves($_REQUEST['id']);

if($res)
{
    header("Location: ../ALE_page_gestUtil.php?notif=5");
}
else
{
    header("Location: ../ALE_page_gestUtil.php?notif=6");
}

exit;
?>