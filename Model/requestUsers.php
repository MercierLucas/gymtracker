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
?>