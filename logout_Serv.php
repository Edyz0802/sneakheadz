<?php
require 'db_connect.php';

session_unset();
session_destroy();
header("location:store.php");
 ?>