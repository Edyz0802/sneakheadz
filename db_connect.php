<?php
ob_start();
if(session_id() == ''){
  session_start();
}
$conn = new mysqli("localhost","root","","sneakheadz");
if($conn->connect_errno) {
  echo "Problemi";
}
?>