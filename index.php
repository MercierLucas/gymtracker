<?php
/*

- Début du site: 
si rien n'est définis on renvoie vers l'accueil
sinon en include la page correspondante

*/

include('Model/connexionBDD.php');

if(isset($_GET['cible']) && !empty($_GET['cible'])){
    $url=$_GET['cible'];
}
else{
    $url='sport';
}

include('Controller/'.$url.'.php');

?>