<?php

include('connexionBDD.php');
function delInprogram($bdd,$idExercice){
    $query='delete from exinprogram where idExinprogram='.$idExercice;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);
}

delInprogram($bdd,$_POST['idinprogram']);

?>