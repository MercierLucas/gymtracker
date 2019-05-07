<?php
/*

- Gère la déconnexion de l'utilisateur

*/
session_start() ;
session_destroy() ;
header('Location: ../index.php?cible=sport&function=login');
exit();

?>