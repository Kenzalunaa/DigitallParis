<?php
    session_start(); //On démarre une session
    require_once 'config.php'; //On a bessoin du fichier config.php

    if(isset($_POST['email']) && isset($_POST['password'])) //On vérifie que les informations rentré existe dans la bdd (base de données)
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT nom, email, password FROM membres WHERE email = ?'); //On se prépare à insérer les données
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password);
                if($data['password'] === $password) //On vérifie le mdp (mot de passe)
                {
                    $_SESSION['user'] = $data['email'];
                    header('Location: offres.php'); //On renvoie à la page offres.php si tout est bon
                    die();
                }else header('Location: connexion.php?login_err=password'); //Sinon on renvoie à la page connexion.php avec un message d'erreur
            }else header('Location: connexion.php?login_err=email');
        }else header('Location: connexion.php?login_err=already');
    }
