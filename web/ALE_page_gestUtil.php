<?php
include 'class/ALE_bibli_gestBD.php';

use GestBD\ConnexionBD;
use GestBD\RequeteBD;

$conn = new ConnexionBD('127.0.0.1', 'ale_veriftp', 'root', '');
$requete = new RequeteBD($conn);
if(!empty($_REQUEST['notif']))
{
  include 'view/ALE_view_notif.php';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Gestion des utilisateurs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../css/bootstrap.min.css">

  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/ALE_RechercheAvancee.js"></script>
  <script src="../js/ALE_Notification.js"></script>

  <title>Liste des élèves</title>
</head>

<body>
  <?php
  include 'view/ALE_view_navBar.php';
  ?>
  <div class="container">
    <div class="row">
      <h1>Liste des élèves</h1>
      <div class="filterable">
        <table class="table table-striped">
          <thead>
            <tr class="filters table">
              <th><a class="btn btn-success" href="ALE_form_ajoutEleve.php">Ajouter</a></th>
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
            if (!empty($requete->listeEleves())) {
              foreach ($requete->listeEleves() as $row) {

                echo '<tr>';
                echo '<td><a class="btn btn-warning m-0 p-1" href="ALE_form_modifEleve.php?nom='. $row['Nom'] .'&prenom='. $row['Prenom'] .'&id='. $row['id'] .'">Modifier</a></td>';
                echo '<td>' . $row['Nom'] . '</td>';
                echo '<td>' . $row['Prenom'] . '</td>';
                echo '<td>' . $row['Trigramme'] . '</td>';
                echo '<td>' . $row['Mail'] . '</td>';
                echo '<td>' . '</td>';
                echo '</tr>';
              }
            } 
            else
            {
              echo
                '<div class="toast erreur fixed-bottom m-5">
                <div class="toast-header ">
                  ERREUR
                </div>
                <div class="toast-body">
                  '. $requete->listeEleves() .'
                </div>
              </div>';
            }

            ?>
          </tbody>
        </table>
      </div>
    </div>
</body>

</html>