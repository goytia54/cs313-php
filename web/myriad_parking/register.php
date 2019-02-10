<?php
session_start();
include_once ('navbar.php');
include '../dbconect.php';
$db = getDBConnection();
$authorized = $_SESSION['authorized'];
if (isset($authorized) && $authorized){
    header('Location: account.php');
}
?>