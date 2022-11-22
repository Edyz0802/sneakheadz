<?php
require 'db_connect.php';
if(isset($_REQUEST['email'] ) && isset($_REQUEST['password'] )  ){

  $email=$_REQUEST['email'];
  $password=$_REQUEST['password'];
  $query="SELECT * FROM Utenti WHERE email='".$email."'  and  password='".$password."' ";
  $result = mysqli_query($con,$query);
  while($array=$result->fetch_assoc()){
    $_SESSION['email']=$email;
    
    header("store.php")

  }

}
?>
