<?php
    try //Conneexion à la BDD (base de données)
    {
        $bdd = new PDO("mysql:host=localhost;dbname=nom_de_la_base_de_donnees;charset=utf8", "root", "");
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>
