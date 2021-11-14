<?php include "../../konekcija/db.php";
include "../../klase/proizvod.php";
global $connnection;
$search=$_POST['search'];
if(!empty($search) || $search=""){
$query = "SELECT id, naziv, opis, slika, cena, kategorija FROM proizvod WHERE naziv LIKE '$search%'";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}
$count=mysqli_num_rows($query_product_info);
if($count<1){
    echo "Nemamo taj proizvod";
}else{
   
    while($row=mysqli_fetch_array($query_product_info)){
        $proizvod = new Proizvod($row['id'], $row['naziv'], $row['opis'], $row['cena'], $row['slika'], $row['kategorija']);
        echo "<div class='product'>
        <div><img class='cardImage' src='{$proizvod->getSlika()}' alt=''></div>
        <div class='cardTitle'>{$proizvod->getNaziv()}</div>
        <div class='description'>{$proizvod->getOpis()}</div>
        <p class='price'>{$proizvod->getCena()}</p>";
        if($_SESSION['admin']){
            echo "<button class='izmeni' id='{$proizvod->getId()}'>Izmeni</button>";
            echo "<button class='obrisi' id='{$proizvod->getId()}'>Obrisi</button>";
    
            }else{
                echo "<button  class='dodajUKorpu' id={$proizvod->getId()}><i style='font-size: 18px; color: black;' class='fa fa-shopping-cart'></i></button>";
            }
    echo "</div>";
    }
}
}
?>