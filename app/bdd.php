<?php
// Connexion à la base de données
// Nous utiliserons aussi le gestionnaire d'erreur
// C'est une bonne pratique d'utiliser le try and catch
/**
* Connection to the DB
*
* @return PDO The connection
*/

try{
    $database_host = 'localhost';
    $database_port = '8889';
    $database_dbname = 'find_it';
    $database_user = 'root';
    $database_password = 'root';
    $database_charset = 'UTF8';
    $database_options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO(
        'mysql:host=' . $database_host .
        ';port=' . $database_port .
        ';dbname=' . $database_dbname .
        ';charset=' . $database_charset,
        $database_user,
        $database_password,
        $database_options
    );
} catch(PDOException $e) {
    die('Erreur : '.$e->getMessage());
}

?>