<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'ALE_view_scriptJSlinkCSS.inc.php' ?>
</head>

<body>
    <?php
    include 'ALE_view_navBar.inc.php';
    ?>
    <?php








    function ScanDirectory($Directory, $i)
    {
        $MyDirectory = opendir($Directory) or die('Erreur');
        $index = 0;
        while ($Entry = @readdir($MyDirectory)) {



            if (is_dir($Directory . '/' . $Entry) && $Entry != '.' && $Entry != '..') {

                $index += 1;
                $dirindex = $i . $index;

                if ($i === 0) {
                    echo    '<div id ="demo' . $i . '"class="btn-secondary" data-toggle="collapse" data-target="#demo' . $dirindex . '" aria-expanded="true">' .
                        '/' . $Entry .
                        '</div>';
                } else {
                    echo    '<div id ="demo' . $i . '"class="btn-secondary collapse" data-toggle="collapse" data-target="#demo' . $dirindex . '" aria-expanded="false">' .
                        '/' . $Entry .
                        '</div>';
                }
                ScanDirectory($Directory . '/' . $Entry, $dirindex);
                echo '<br/>';
            } else {
                //$i = $i-1;
                if ($Entry != '.' && $Entry != '..') {
                    echo    '<div id="demo' . $i . '" class="collapse bg-info ">' .
                        $Entry .
                        '</div>';
                }
            }
        }
        closedir($MyDirectory);
    }

    ScanDirectory('..', 0);




    ?>
</body>

</html>