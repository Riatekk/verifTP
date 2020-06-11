<nav class="navbar navbar-inverse navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == "/veriftp/web/ALE_page_scandir.php") {
                              echo 'active';
                            } ?>" href="ALE_page_scandir.php">Explorateur de fichiers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == "/veriftp/web/ALE_page_gestUtil.php") {
                              echo 'active';
                            } ?>" href="ALE_page_gestUtil.php">Liste des élèves</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="disabled" href="ALE_form_parametre.php"><span class="glyphicon glyphicon-user"></span>Paramètre du site</a></li>
    </ul>
  </div>
</nav>