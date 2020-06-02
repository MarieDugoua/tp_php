<?php
	// destroy the session 
	session_destroy();

	// On redirige vers la page de connexion
	header('Location: index.php?id=1');

?>