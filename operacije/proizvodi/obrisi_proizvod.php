<?php include "../../konekcija/db.php";
global $connnection;
    $id = $_POST['id'];
    $query ="DELETE FROM proizvod WHERE id=$id";
    $result_set=mysqli_query($connnection, $query);
    if(!$result_set){
        die("query failed"); 

}
header("Location:http://localhost/petshop/admin.html");

?>