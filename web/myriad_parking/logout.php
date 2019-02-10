<?php
    session_start();
    $authorized = $_SESSION['authorized'];
    if (isset($authorized) && $authorized) {
        $_SESSION['authorized'] = false;
        header('Location: account.php');
    }
    else{
        header('Location: login.php');
    }
    ?>

