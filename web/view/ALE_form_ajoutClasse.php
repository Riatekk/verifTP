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

/**
 * Si la connexion ne s'établie pas ou que le fichier XML
 * contenant les informations de la base de données n'exite
 * pas, alors on redirige vers une page d'erreur.
 */

if (!$conn->connexion() || !file_exists($cheminXML)) {
    if (!empty($_REQUEST['notif'])) {
        header("Location: ALE_page_erreur.php?notif=" . $_REQUEST['notif']);
    } else {
        header("Location: ALE_page_erreur.php");
    }
}


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
            <h1>Gérer les classes</h1>
            <p>Les classes pourront etre sélectionné et y ajouter un ou plusieurs élèves</p>
        </div>
    </div>

    <div class="container">
        <a href="ALE_page_gestUtil.php" class=" btn btn-info mb-4">Retour</a>
        <table class="table">
            <td>
                <h2>Ajouter une classe</h2>
                <form class="needs-validation" action="../function/ALE_insert_classe.php" method="get" novalidate>
                    <div class="form-group">
                        <label for="classe" class="mr-sm-2">Nom de la classe</label>
                        <input type="classe" class="form-control" placeholder="Indiquez le nom de la classe" id="classe" name="classe" value="" required>

                        <div class="valid-feedback">Valide</div>
                        <div class="invalid-feedback">Renseigner le nom de la classe</div>
                    </div>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </form>
                <br />
                <br />
            </td>
            <td>
                <h2>Supprimer une classe</h2>
                <p class="text-danger">Attention : Si vous supprimez une classe les élèves disparaiteront</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nom de la classe</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        /**
                         * Pour chaque ligne recupéré on l'ajoute au tableau
                         */
                        $i = 1;
                        foreach ($requete->listeClasse() as $row) {

                            $i += 1;

                            echo '<tr>
              
              <td>' . $row['classe_libelle'] . '</td>

              <td>

                  <script>
                    $(document).ready(function () {
                      $("#myBtn' . $i . '").click(function () {
                          $(\'.toast' . $i . '\').toast(\'show\');
                      });
                      $(\'.toast' . $i . '\').toast({
                        delay: 3600000
                      });
                  });
                  </script>

                  <a id="myBtn' . $i . '" class="btn btn-info m-0 p-1 justify-content-end">
                    <img class=".mx-auto d-block" src="../../icon/gear-wide-connected.svg" alt="" height="30">
                  </a>

                  <div class="toast toast' . $i . ' fade hide position-absolute">
                    
                    <div class="toast-header">
                      <div type="button" class="btn close text-right " data-dismiss="toast">&times;</div>
                      <div class="font-weight-bold"> ' . $row['classe_libelle'] .  ' </div>
                    </div>

                    <div class="toast-body">
                    <a class="btn btn-danger m-0 p-1" href="../function/ALE_delete_eleves.php?id=' . $row['classe_libelle'] . '">Supprimer la classe</a>
                    </div>
                  
                  </div>
                </td>
                  </tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </td>
            </tr>
        </table>
        <br />
        <br />
        <br />
        <br />

    </div>
</body>

</html>