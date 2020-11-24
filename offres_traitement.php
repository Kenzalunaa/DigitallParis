<?php
    require_once 'config.php';

    if(isset($_POST['telephone']) && isset($_POST['marque_voiture']) && isset($_POST['modele_voiture']))
    {
        $telephone = htmlspecialchars($_POST['telephone']);
        $marque_voiture = htmlspecialchars($_POST['marque_voiture']);
        $modele_voiture = htmlspecialchars($_POST['modele_voiture']);

        $check = $bdd->prepare('SELECT telephone, marque_voiture, modele_voiture FROM membres WHERE email = ?');
        $check->execute(array($email));

        $insert = $bdd->prepare('INSERT INTO membres (telephone, marque_voiture, modele_voiture) VALUES (:telephone, :marque_voiture, :modele_voiture)');
        $insert->execute(array(
            'telephone' => $telephone,
            'marque_voiture' => $marque_voiture,
            'modele_voiture' => $modele_voiture
        ));
}
?>
