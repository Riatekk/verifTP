<?php
if($_REQUEST['notif'] == 1){
    echo
    '<div class="toast notif fixed-bottom m-5">
    <div class="toast-header text-white bg-success">
    Succès d\'insertion
    </div>
    <div class="toast-body">
        L\'insertion est réussi avec succès
    </div>
    </div>';
}

if($_REQUEST['notif'] == 2)
{
    echo
    '<div class="toast notif  fixed-bottom m-5">
    <div class="toast-header text-white bg-danger">
    Erreur d\'insertion
    </div>
    <div class="toast-body">
        L\'insertion à echoué
    </div>
    </div>';
}

if($_REQUEST['notif'] == 3)
{
    echo
    '<div class="toast notif  fixed-bottom m-5">
    <div class="toast-header text-white bg-success">
    Succès de modification
    </div>
    <div class="toast-body">
        La modification est réussi avec succès
    </div>
    </div>';
}

if($_REQUEST['notif'] == 4)
{
    echo
    '<div class="toast notif  fixed-bottom m-5">
    <div class="toast-header text-white bg-danger">
    Erreur de modification
    </div>
    <div class="toast-body">
        La modification à echoué
    </div>
    </div>';
}

if($_REQUEST['notif'] == 5)
{
    echo
    '<div class="toast notif  fixed-bottom m-5">
    <div class="toast-header text-white bg-success">
    Succès de suppression
    </div>
    <div class="toast-body">
        La suppression est réussi avec succès
    </div>
    </div>';
}

if($_REQUEST['notif'] == 6)
{
    echo
    '<div class="toast notif  fixed-bottom m-5">
    <div class="toast-header text-white bg-danger">
    Erreur de suppression
    </div>
    <div class="toast-body">
        La suppression à echoué
    </div>
    </div>';
}
?>
