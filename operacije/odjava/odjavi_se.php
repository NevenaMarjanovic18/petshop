<?php
session_start();
unset($_SESSION['admin']);
header("Location:http://localhost/petshop/index.html");
?>