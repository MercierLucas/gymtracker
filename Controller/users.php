<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
include('Model/requestUsers.php');
if(isset($_GET['function']) || !empty($_GET['function'])){
    $function=$_GET['function'];
}
else{
    $function='user';
}
if(!isset($_SESSION['firstname'])){
    $function='notloggedin';
}
switch($function){
    case 'user':
        $view='user';
        break;
        
    case 'notloggedin':
        $view='notconnected';
        break; 
}


include('View/'.$view.'.php');

if(isset($error)) echo $error;

?>
