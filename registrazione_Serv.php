<?php
require 'db_connect.php';

if (isset($_REQUEST['nome']) and isset($_REQUEST['cognome']) and isset($_REQUEST['email']) and isset($_REQUEST['password'])){
  $nome = $_REQUEST['nome'];
  $cognome = $_REQUEST['cognome'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $query = "SELECT * FROM utenti WHERE email='".$email."'";
  $result = mysqli_query($conn, $query);
  if($result->num_rows==0){

    $sql="INSERT INTO utenti (nome,cognome,email,password) VALUES ('$nome','$cognome','$email','$password')";
    echo $sql;
    if(mysqli_query($conn,$sql)) {
      echo "<p>Utente registrato</p>";

      $conn->close();
    }
  }else {
    header("location: store.php");
  }

  header("location: login.php");

}
?>
