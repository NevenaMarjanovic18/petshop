<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stilovi/korpa.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Korpa</title>
</head>

<body>
<nav role="navigation">
            <ul>
              <li><a href="/telefoni-master/index.html">Pocetna</a></li><li><a href="/telefoni-master/korpa.php"><i style="font-size: 20px; color: white;" class="fa fa-shopping-cart"></i></a></li><li><a href="/telefoni-master/prijavi_se.html">Uloguj Se</a></li>
            </ul>
        </nav>

<div id="w">
<?php include "./konekcija/db.php";
session_start();
global $connnection;
$query = "SELECT id, naziv, opis, slika, cena, kategorija FROM proizvod";
$query_product_info=mysqli_query($connnection, $query);
if(!$query_product_info){
    die("Error"); 
}
$korpa = array();
while($row=mysqli_fetch_array($query_product_info)){
    $korpa[count($korpa)] = array('slika'=>$row['slika'], 'opis'=>$row['opis'], 'cena'=>$row['cena'], 'naziv'=>$row['naziv'], 'id'=>$row['id']);
}
echo "
<div id='page'>
<table id='cart'>
  <thead>
    <tr>
      <th class='first'>Photo</th>
      <th class='second'>Qty</th>
      <th class='third'>Product</th>
      <th class='fourth'>Line Total</th>   
    </tr>
  </thead>
  <tbody>";
for($i=0;$i<count($_SESSION['korpa']);$i++){
    $id=$_SESSION['korpa'][$i];
    for($j=0;$j<count($korpa);$j++){
        if($korpa[$j]['id']==$id){
            echo "<tr class='productitm'>
                  <td><img src='{$korpa[$j]['slika']}' class='thumb'></td>
                  <td><input type='number' value='1' min='0' max='99' class='qtyinput' disabled></td>
                  <td>{$korpa[$j]['naziv']}</td>
                  <td>{$korpa[$j]['cena']}</td>
                  <td><span id='{$i}'class='remove'><i  style='color: red; font-size: 20px;' class='fa fa-trash'></i></span></td>
                </tr>";
        }
    }
}
echo "<tr class='checkoutrow'>
<td colspan='5' class='checkout'>
    <input type='text' id='ime' name='ime' placeholder='ime'>
    <input type='text' id='prezime' name='prezime' placeholder='prezime'>
    <input type='text' id='adresa' name='adresa' placeholder='adresa'></td>                
</tr>
<tr class='checkoutrow'>
<td colspan='5' class='naruci'><button style='margin-top: 10px;' id='submitbtn'>Checkout Now!</button></td>
</tr>
</tbody>
</table>
</div>";
?>
</div>
<body style="padding: 0px 0px;">
