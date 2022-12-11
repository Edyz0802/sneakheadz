<?php

require 'db_connect.php';

if(isset($_REQUEST['quantita'] ) && isset($_REQUEST['insert'] )  ){

  $quantita =$_REQUEST['quantita'];
  $modello=$_GET['modello'];

//query sel utente
$query1="SELECT * FROM utenti WHERE email='".$_SESSION['email']."'";
$result1 = mysqli_query($conn,$query1);

while($array1=$result1->fetch_assoc()) {

    $idUtente = $array1['idUtente'];

  //query selezione modello
  $query2="SELECT * FROM prodotti WHERE modello='".$modello."'";
  $result2 = mysqli_query($conn,$query2);

  while($array2=$result2->fetch_assoc()) {

  $idProdotto = $array2['idProdotto'];
  $prezzoTot = $quantita * $array2['prezzo'];
  $email = $_SESSION['email'];

  //idCarrello AUTO INCREMENT
  $query3 = "INSERT INTO carrello (idUtente, idProdotto, email, prezzoTot, quantita) VALUES ('$idUtente','$idProdotto','$email','$prezzoTot','$quantita')";
  $result3 = mysqli_query($conn,$query3);

    header("Location:carrello.php");

  }}

  if(!$result3){

    die('Insert carrello non riuscita' .mysqli_error($conn));
  }

}
?>
