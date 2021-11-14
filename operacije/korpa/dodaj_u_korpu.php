<?php
session_start();
    $id = $_POST['id'];
    $_SESSION['korpa']=isset($_SESSION['korpa']) ? $_SESSION['korpa'] : array();
    $_SESSION['korpa'][count($_SESSION['korpa'])]=$id;
    echo count($_SESSION['korpa']);

?>