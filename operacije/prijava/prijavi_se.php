<?php
session_start();
if(isset($_POST['submit'])) {
$username = $_POST['username'];
$password = $_POST['password'];
 
if($username=="admin" && $password=="admin"){
    header("Location:http://localhost/petshop/admin.html");
    $_SESSION['admin']="admin";
}  
  else{
      die("you are not an admin");
  }
}
?>