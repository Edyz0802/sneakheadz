<?php
require 'db_connect.php';
if(isset($_REQUEST['email'] ) && isset($_REQUEST['password'] )  ){

  $email =$_REQUEST['email'];
  $password=$_REQUEST['password'];
  $query ="SELECT * FROM utenti WHERE email='".$email."'  and  password='".$password."' ";
  $result = mysqli_query($conn,$query);
  while($array=$result->fetch_assoc()){
    $_SESSION['email']=$email;
    
    header("Location:index.php");

  }

}
?>
