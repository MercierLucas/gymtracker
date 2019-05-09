<?php

include('connexionBDD.php');
function getExInProgram($bdd,$idUser,$idProgram){
    $query='select globalexercices.name as exname,sets,reps,rest FROM exinprogram join globalexercices on idExercice=idGlobalexercices join program on exinprogram.idProgram=program.idProgram where exinprogram.idProgram='.$idProgram.' and idUtilisateur='.$idUser;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);
}

getExInProgram($bdd,$_SESSION['userid'],$_POST['idprogram']);
?>