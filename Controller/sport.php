<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
include('Model/requestUsers.php');
if(isset($_GET['function']) || !empty($_GET['function'])){
    $function=$_GET['function'];
}
else{
    $function='home';
}
switch($function){
    case "home":
        $view='home';
        break;

    case "login":
        $view='login';
        if(isset($_POST['mail']) && isset($_POST['password'])){
            $mail=htmlspecialchars($_POST['mail']);
            $password=hash("sha256",htmlspecialchars($_POST['password']));
            $user=connect($bdd,$mail,$password);
            if(!$user){
                $error="Wrong information";
                break;
            }
            if($password==$user[0]['password']){
                $_SESSION['userid']=$user[0]['idUsers'];
                $_SESSION['firstname']=$user[0]['firstName'];
                $_SESSION['lastname']=$user[0]['lastName'];
                $_SESSION['mail']=$user[0]['mail'];
                header("Location: /gymtracker/?cible=users"); // Post / request / get 
                exit();
            }
        }
        break;

    case "register":
        $view='register';
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['password'])){
            $firstname=htmlspecialchars($_POST['firstname']);
            $lastname=htmlspecialchars($_POST['lastname']);
            $mail=htmlspecialchars($_POST['mail']);
            $remail=htmlspecialchars($_POST['remail']);
            $password=hash("sha256",htmlspecialchars($_POST['password']));
            $repassword=hash("sha256",htmlspecialchars($_POST['repassword']));

            if($mail === $remail){
                if($password === $repassword){
                    if(!checkMailExist($bdd,$mail)){
                        createUser($bdd,$firstname,$lastname,$mail,$password);
                        header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                        exit();
                    }else{
                        $error="This mail adresse is already taken";
                    }
                }else{
                    $error="Passwords doesnt matches";
                }
            }else{
                $error="Mails doesnt matches";
            }
        }
        break;
    
}


include('View/'.$view.'.php');

?>
