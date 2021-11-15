<?php include "../../konekcija/db.php";
global $connnection;
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $cena=$_POST['cena'];
    $opis=$_POST['opis'];
    $slika=$_POST['slika'];
    $kategorija=$_POST['kategorija'];
    $query ="UPDATE proizvod SET naziv='$naziv', cena=$cena ,opis='$opis',slika='$slika',kategorija='$kategorija' WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 
}
header("Location:http://localhost/petshop/admin.html");
?>