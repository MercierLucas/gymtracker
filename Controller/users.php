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
            $programList=getPrograms($bdd,$_SESSION['userid']);
            if(isset($_POST['exgroup']) && isset($_POST['exname']) && isset($_POST['exnotes'])){
                $exname=htmlspecialchars($_POST['exname']);
                $exnotes=htmlspecialchars($_POST['exnotes']);
                $exgroup=$_POST['exgroup'];
                addExercice($bdd,$exgroup,$exname,$exnotes);
                header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                exit();
            }
            if(isset($_POST['pgmname'])){
                addProgram($bdd,$_POST['pgmname'],$_SESSION['userid']);
                header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                exit();
            }
            if(isset($_POST['exgroup']) && isset($_POST['exname']) && isset($_POST['sets']) && isset($_POST['reps']) && isset($_POST['rest']) ){
                $idExercice=getSpecificExercice($bdd,$_POST['exname'])[0]['idGlobalExercices'];
                $idProgram=$_POST['id'];
                $sets=htmlspecialchars($_POST['sets']);
                $reps=htmlspecialchars($_POST['reps']);
                $rest=htmlspecialchars($_POST['rest']);
                addToProgram($bdd,$idExercice,$idProgram,$sets,$reps,$rest);
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

<script src="Controller/behaviour.js">console.log('ok');</script>