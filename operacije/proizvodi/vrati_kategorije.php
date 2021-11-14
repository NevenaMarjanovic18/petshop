<?php include "../../konekcija/db.php";
include "../../klase/kategorija.php";
global $connnection;

$query = "SELECT id, naziv FROM kategorija";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}

while($row=mysqli_fetch_array($query_product_info)){
  $kategorija = new Kategorija($row['id'],$row['naziv']);
   echo "<li><a class='kategorija' id='{$kategorija->getId()}'>{$kategorija->getNaziv()}</a></li>";
}

?>