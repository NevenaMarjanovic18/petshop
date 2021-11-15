<?php
session_start();
    echo $_GET['id'];
    if(isset($_GET['id'])){
    $niz=$_SESSION['korpa'];
    array_splice($niz,"".$_GET['id'], 1);
    $_SESSION['korpa']=$niz;
}
?>