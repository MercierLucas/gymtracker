<?php

function checkMailExist($bdd,$mail){
    $query='select mail from users where mail like "%'.$mail.'%"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    if(sizeof($donnees)==0) return FALSE;
    return TRUE;
}

function createUser($bdd,$firstname,$lastname,$mail,$password){
    $sql='insert into users (idUsers,firstname,lastname,mail,password) VALUES (?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$firstname,$lastname,$mail,$password])){
        echo $stmt->errorCode();
        return;
    }
}

function connect($bdd,$mail,$password){
    $query='select * from users where mail like "%'.$mail.'%" and password = "'.$password.'"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    if(sizeof($donnees)==0) return FALSE;
    return $donnees;
}

function addExercice($bdd,$musclegrp,$name,$notes){
    $sql='insert into globalexercices (idGlobalExercices,muscle,name,notes) VALUES (?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$musclegrp,$name,$notes])){
        echo $stmt->errorCode();
        return;
    }
}

function getExercices($bdd){
    $query='select * from globalexercices';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function getPrograms($bdd,$idUser){
    $query='select * from program where idUtilisateur='.$idUser;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function addProgram($bdd,$name,$idUser){
    $sql='insert into program (idProgram,name,idUtilisateur) VALUES (?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$name,$idUser])){
        echo $stmt->errorCode();
        return;
    }
}
function getSpecificExercice($bdd,$name){
    $query='select idGlobalExercices from globalexercices where name like"%'.$name.'%"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}
function addToProgram($bdd,$idExercice,$idProgram,$sets,$reps,$rest){
    $sql='insert into exinprogram (idExinprogram,idExercice,idProgram,sets,reps,rest) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$idExercice,$idProgram,$sets,$reps,$rest])){
        echo $stmt->errorCode();
        return;
    }

}


?>