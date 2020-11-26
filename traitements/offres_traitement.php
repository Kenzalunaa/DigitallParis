<?php
    require_once '../view/config.php'; //On a bessoin du fichier config.php

//On traite les données pour pouvoir les insérer dans la BDD (base de données)
    if(isset($_POST['telephone']) && isset($_POST['marque_voiture']) && isset($_POST['modele_voiture']))
    {
        $telephone = htmlspecialchars($_POST['telephone']);
        $marque_voiture = htmlspecialchars($_POST['marque_voiture']);
        $modele_voiture = htmlspecialchars($_POST['modele_voiture']);

        $check = $bdd->prepare('SELECT telephone, marque_voiture, modele_voiture FROM membres WHERE email = ?'); //On se prépare à insérer les données
        $check->execute(array($email));

        $insert = $bdd->prepare('INSERT INTO membres (telephone, marque_voiture, modele_voiture) VALUES (:telephone, :marque_voiture, :modele_voiture)'); //On insert les données
        $insert->execute(array(
            'telephone' => $telephone,
            'marque_voiture' => $marque_voiture,
            'modele_voiture' => $modele_voiture
        ));
}
?>
