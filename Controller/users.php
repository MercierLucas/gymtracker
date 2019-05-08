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
            $exercicesList=getExercices($bdd);
            if(isset($_POST['exgroup']) && isset($_POST['exname']) && isset($_POST['exnotes'])){
                $exname=htmlspecialchars($_POST['exname']);
                $exnotes=htmlspecialchars($_POST['exnotes']);
                $exgroup=$_POST['exgroup'];
                addExercice($bdd,$exgroup,$exname,$exnotes);
                header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                exit();
            }
            break;
            
        case 'notloggedin':
            $view='notconnected';
            break; 
    }


    include('View/'.$view.'.php');

    if(isset($error)) echo $error;

?>
