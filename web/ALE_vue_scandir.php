<?php
include 'function/ALE_function_gestBD.php';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ALE_RechercheAvancee.js"></script>
</head>

<body>
    <?php
    include 'view/ALE_view_navBar.php';
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

                if($i === 0)
                {
                    echo    '<div id ="demo' . $i . '"class="btn-secondary" data-toggle="collapse" data-target="#demo' . $dirindex . '" aria-expanded="true">' .
                        '/' . $Entry .
                        '</div>';
                }
                else
                {
                    echo    '<div id ="demo' . $i . '"class="btn-secondary collapse" data-toggle="collapse" data-target="#demo' . $dirindex . '" aria-expanded="false">' .
                        '/' . $Entry . 
                        '</div>';
                }
                ScanDirectory($Directory . '/' . $Entry, $dirindex);
                echo '<br/>';
            }
            else 
            {
                //$i = $i-1;
                if($Entry != '.' && $Entry != '..')
                {
                    echo    '<div id="demo' . $i . '" class="collapse bg-info ">'.
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