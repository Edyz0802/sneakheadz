<?php
require 'db_connect.php';

if (isset($_REQUEST['nome']) and isset($_REQUEST['cognome']) and isset($_REQUEST['email']) and isset($_REQUEST['password'])){
  $nome = $_REQUEST['nome'];
  $cognome = $_REQUEST['cognome'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $query = "SELECT * FROM SneakHeadz WHERE email='".$email."'";
  $result = mysqli_query($con, $query);
  if($result->num_rows==0){

    $sql="INSERT INTO SneakHeadz (nome,cognome,email,password) VALUES ('$nome','$cognome','$email','$password')";
    echo $sql;
    if(mysqli_query($con,$sql)) {
      echo "<p>Utente registrato</p>";

      $con->close();
    }
  }else {
    echo "utente gia presente";
  }

  header("location: index.php");

}
?>
