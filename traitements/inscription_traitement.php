<?php
    require_once '../view/config.php';

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $bdd->prepare('SELECT nom, prenom, email, password FROM membres WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){
            if(strlen($nom) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                            $password = hash('sha256', $password);
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $bdd->prepare('INSERT INTO membres (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'email' => $email,
                                'password' => $password
                            ));

                            header('Location: ../view/offres.php?reg_err=success');
                        }else header('Location: ../view/inscription.php?reg_err=password');
                    }else header('Location: ../view/inscription.php?reg_err=email');
                }else header('Location: ../view/inscription.php?reg_err=email_length');
            }else header('Location: ../view/inscription.php?reg_err=nom_length');
        }else header('Location: ../view/inscription.php?reg_err=already');
    }
