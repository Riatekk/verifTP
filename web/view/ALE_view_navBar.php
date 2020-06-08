<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['PHP_SELF'] == "/VerifTP/web/ALE_vue_scandir.php"){echo 'active';}?>" href="ALE_vue_scandir.php">Explorateur de fichiers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($_SERVER['PHP_SELF'] == "/VerifTP/web/ALE_vue_gestUtil.php"){echo 'active';}?>" href="ALE_vue_gestUtil.php">Liste des élèves</a>
      </li>
    </ul>
  </nav> 

  <?php 
  //echo $_SERVER['PHP_SELF']
  ?>