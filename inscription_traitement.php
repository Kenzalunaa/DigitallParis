<?php
    require_once 'config.php'; //On a bessoin de config.php

//On traite les données pour pouvoir les insérer dans la BDD (base de données)
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $bdd->prepare('SELECT nom, prenom, email, password FROM membres WHERE email = ?'); //On se prépare à insérer les données
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){
            if(strlen($nom) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                            $password = hash('sha256', $password); //Mise en place d'un hashage (sha256)
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $bdd->prepare('INSERT INTO membres (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)'); //On insert les données
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password
                            ));

                            header('Location:offres.php?reg_err=success'); //On renvoie à la page offres.php si tout est bon
                        }else header('Location: inscription.php?reg_err=password'); //Sinon on renvoie à la page connexion.php avec un message d'erreur
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?reg_err=email_length');
            }else header('Location: inscription.php?reg_err=nom_length');
        }else header('Location: inscription.php?reg_err=already');
    }
