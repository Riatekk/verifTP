<?php
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
            <h1>Connexion à la base de données impossible</h1>
            <p>Modifier les parametres de la base de données pour corriger les problème
                <br />
                <a class="btn btn-primary btn-lg mt-3 btn-block" href="ALE_form_parametre.php">Paramètre de la base de données</a>
            </p>
        </div>
    </div>
</body>

</html>