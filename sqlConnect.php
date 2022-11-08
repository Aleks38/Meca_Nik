<?php
    try
    {
    // Souvent on identifie cet objet par la variable $conn ou $db
    $mysqlClient = new PDO(
    'mysql: host=localhost; dbname=entrepotmecanik; charset=utf8', 'root');
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
?>