<?php $database = "EntrepotMecaNik";
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=EntrepotMecaNik;charset=utf8',
            'root');
        }
        catch (Exception $e)
        {
            die('Erreur :' . $e->getMessage());
        }
?>