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
        echo '<li>';
        while ($Entry = @readdir($MyDirectory)) {



            if (is_dir($Directory . '/' . $Entry) && $Entry != '.' && $Entry != '..') {

                $index += 1;
                $dirindex = $i . $index;
                if ($i === 0) {

                    echo '<ul><div id ="demo' . $i . '" class="btn-secondary" data-toggle="collapse" data-target="#demo' . $dirindex . '">/' . $Entry .'</div>';
                    echo    '<div id ="demo' . $dirindex . '" class="collapse" data-toggle="collapse" aria-expanded="true">';
                    ScanDirectory($Directory . '/' . $Entry, $dirindex);
                    echo '</div></ul>';

                } else {

                    echo '<ul><div id ="demo' . $i . '" class="btn-info collapse" data-toggle="collapse" data-target="#demo' . $dirindex . '">/' . $Entry .'</div>';
                    echo    '<div id ="demo' . $dirindex . '" class="collapse" data-toggle="collapse" aria-expanded="true">';
                    ScanDirectory($Directory . '/' . $Entry, $dirindex);
                    echo '</div></ul>';

                }
            } else {
                //$i = $i-1;
                if ($Entry != '.' && $Entry != '..') {
                    echo    '<ul><div id="demo' . $i . '" class="collapse">' .
                        $Entry .
                        '</div></ul>';
                }
            }
        }
        echo '</li>';
        closedir($MyDirectory);
    }

    ScanDirectory('../..', 0);
    ?>
</body>

</html>