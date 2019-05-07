<?php
	if(!isset($_SESSION)) {
		session_start();
   }
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=gymtracker', 'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>