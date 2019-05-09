<?php

include('connexionBDD.php');
function getExerciceList($bdd,$muscle){
    $query='select * from globalexercices where muscle like "%'.$muscle.'%"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);
}

getExerciceList($bdd,$_POST['name']);
?>