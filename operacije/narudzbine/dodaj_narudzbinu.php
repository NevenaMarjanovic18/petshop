<?php include "../../konekcija/db.php";
global $connnection;
session_start();

$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$adresa = $_POST['adresa'];

$ime = mysqli_real_escape_string($connnection, $ime );   
$prezime = mysqli_real_escape_string($connnection, $prezime);  
$adresa = mysqli_real_escape_string($connnection, $adresa);    


    $query = "INSERT INTO porudzbina(ime, prezime, adresa) ";
    $query .= "VALUES ('$ime', '$prezime','$adresa')";

   $result = mysqli_query($connnection, $query);
   
    if(!$result) {
        die('Query FAILED');
    }else{
        //prolazimo kroz proizvode iz korpe
        $narudzbina_id = mysqli_insert_id($connnection);
        for($i=0;$i<count($_SESSION['korpa']);$i++){
            $id=$_SESSION['korpa'][$i];
            $query1 = "INSERT INTO stavka(porudzbina_id, proizvod_id) VALUES ($narudzbina_id, $id)";
            $result = mysqli_query($connnection, $query1);
        }
        unset($_SESSION['korpa']);
        header("Location:http://localhost/petshop/index.html");
    }

?>