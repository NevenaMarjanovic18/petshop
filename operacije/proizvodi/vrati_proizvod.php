<?php include "../../konekcija/db.php";
global $connnection;    
if(isset($_POST['id'])){
$id=$_POST['id'];
$query = "SELECT id, naziv, cena, opis, slika, kategorija FROM proizvod WHERE id =".$id;
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error");
}

while($row=mysqli_fetch_array($query_product_info)){
    echo " <div id='form'class='add-new' style='padding-top:0px;'>
    <div id='izmeni' class='form'><form class='add-form' method='post' action='operacije/proizvodi/izmeni_proizvod.php'>
    <input style='color:black;'type='text' name='naziv' placeholder='naziv' value='{$row['naziv']}'/>
    <input style='color:black;'type='text' name='opis'placeholder='opis'value='{$row['opis']}'/>
    <input style='color:black;'type='text' name='slika'placeholder='url'value='{$row['slika']}'/>
    <input style='color:black;'type='text' name='cena'placeholder='cena'value='{$row['cena']}'/>
    <input style='display: none; color:black;'type='text' name='kategorija' placeholder='kategorija 'value='{$row['kategorija']}'/>
        <input style='display:none;'type='text' rel= '".$row['id']."'name='id' value='".$row['id']."'/>
        <button style='cursor: pointer;'>Sacuvaj</button>
      </form>
    </div>
  </div>";
}
}
?>