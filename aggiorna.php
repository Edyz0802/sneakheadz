<?php

include('db_connect.php');

$idOrdine=$_POST['idOrdine'];
$idProdotto=$_POST['idProdotto'];
$quantita=$_POST['quantita'];

$query="UPDATE carrello SET quantita=$quantita WHERE email=$idOrdine AND idProdotto=$idProdotto";
mysqli_query($conn,$query);


?>
