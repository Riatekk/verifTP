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
  <?php
  /**
   * On inclut les script javascript et les liens
   * css
   */
  include 'ALE_view_scriptJSlinkCSS.inc.php' ?>

  <title>Liste des élèves</title>
</head>

<body>
  <?php
  /**
   * On ajoute la barre de navigation
   */
  include 'ALE_view_navBar.inc.php';
  ?>
  <div class="container">
    <div class="row">

      <div class="container mt-3 mb-3">

        <div class="d-flex">
          <h1 class="mr-auto">Liste des élèves</h1>
          <div class="p-2">
            <a class="btn btn-primary" href="ALE_form_ajoutClasse.php">Gérer les classes</a>
          </div>
          <div class="p-2">
            <a class="btn btn-success" href="ALE_form_ajoutEleve.php">Ajouter des élèves</a>
          </div>
          

          <div class="p-2">
            <script>
              $(document).ready(function() {
                $("#myBtn0").click(function() {
                  $('.toast0').toast('show');
                });
                $('.toast0').toast({
                  delay: 3600000
                });
              });
            </script>
            <a id="myBtn0" class=" btn btn-danger text-white">Supprimer les élèves par classe</a>

            <div class="toast toast0 fade hide position-absolute">

              <div class="toast-header">
                <div type="button" class="btn close text-right " data-dismiss="toast">&times;</div>
                <div class="font-weight-bold">
                  Quelle classe voulez-vous supprimer ?
                </div>
              </div>

              <div class="toast-body">
                <form action="../function/ALE_delete_classe.php" method="get">
                  <label for="classe" class="mr-sm-2">La classe : </label>
                  <select classe="form-control" name="classe" id="classe">
                    <option value="1">1SIO</option>
                    <option value="2">2SIO</option>
                  </select>
                  <input type="submit" class="btn btn-danger btn-sm" value="Supprimer les élèves">
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="filterable">
        <table class="table table-striped">
          <thead>
            <tr class="filters table">
              <th><input type="text" class="form-control" placeholder="CLasse" disabled></th>
              <th><input type="text" class="form-control" placeholder="Nom" disabled></th>
              <th><input type="text" class="form-control" placeholder="Prenom" disabled></th>
              <th><input type="text" class="form-control" placeholder="Trigramme" disabled></th>
              <th><input type="text" class="form-control" placeholder="Email" disabled></th>
              <th>
                <div class="btn btn-primary btn-filter w-100">Filtre</div>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            /**
             * Pour chaque ligne recupéré on l'ajoute au tableau
             */
            $i = 1;
            foreach ($requete->listeEleve() as $row) {

              $i += 1;

              echo '<tr>
              
              <td>' . $row['classe_libelle'] . '</td>
              <td>' . $row['Nom'] . '</td>
              <td>' . $row['Prenom'] . '</td>
              <td>' . $row['Trigramme'] . '</td>
              <td>' . $row['Mail'] . '</td>

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

                  <a id="myBtn' . $i . '" class="btn btn-info m-0 p-1">
                    <img class=".mx-auto d-block" src="../../icon/gear-wide-connected.svg" alt="" height="30">
                  </a>

                  <div class="toast toast' . $i . ' fade hide position-absolute">
                    
                    <div class="toast-header">
                      <div type="button" class="btn close text-right " data-dismiss="toast">&times;</div>
                      <div class="font-weight-bold"> ' . $row['Nom'] . ' ' . $row['Prenom'] . ' </div>
                    </div>

                    <div class="toast-body">
                    Voulez-vous le <a class="btn btn-warning m-0 p-1" href="ALE_form_modifEleve.php?nom=' . $row['Nom'] . '&prenom=' . $row['Prenom'] . '&id=' . $row['id'] . '">Modifier</a>
                     ou le <a class="btn btn-danger m-0 p-1" href="../function/ALE_delete_eleves.php?id=' . $row['id'] . '">Supprimer</a> ?
                    </div>
                  
                  </div>
                </td>
                  </tr>';
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
</body>

</html>