<?php
    session_start(); //On démarre une session

    session_destroy(); //On détruit une session
    header('Location:index.php'); //On redirige vers index.php
    exit;
    ?>
