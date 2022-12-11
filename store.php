<!doctype html>
<html lang="en">
<head>
  <?php require 'db_connect.php';
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>SneakHeadz</title>
</head>

<body style="background-image: url('immagini/s4.jpg');
  background-repeat: no-repeat;
	background-size: cover;
	margin: 0;">
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SneakHeadz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="store.php">STORE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registrazione.php">REGISTRAZIONE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout_Serv.php">LOGOUT</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <?php

  if(isset($_SESSION['email'])){

  $query1="SELECT * FROM utenti WHERE email='".$_SESSION['email']."'";
  $result1 = mysqli_query($conn,$query1);

  while($array1=$result1->fetch_assoc()) {
    
    echo("<h3><center><br>Ciao, ".$array1['nome']."<br><br></center></h3>");
  }
  }
  else{
    echo("<h3><center><br>Benvenuto, Utente Sconosciuto<br><br></center></h3>");
  }
   
  ?>

  <table class="table">
  <thead>
    <tr>

      <th scope="col"><h4>N</h4></th>
      <th scope="col"><h4>Marca</h4></th>
      <th scope="col"><h4>Modello</h4></th>
      <th scope="col"><h4>Foto</h4></th>
      <th scope="col"><h4>Prezzo</h4></th>
      <th scope="col"><h4></h4></th>

    </tr>
  </thead>
  <tbody>

  <?php

    $query="SELECT idProdotto, marca, modello, prezzo, img FROM prodotti ";
    $result = mysqli_query($conn,$query);
    $nTab = 0;

    while($array=$result->fetch_assoc()){

      // echo("prova"); QUA ENTRA

      $marca = $array['marca'];
      $modello = $array['modello'];
      $prezzo = $array['prezzo'];
      $img = $array['img'];
      $nTab = $nTab+1;

      echo "<tr>";

      echo "<th scope=\"row\"><br><br><br><br><br><br><h5>".$nTab."</h5></th>";
      echo "<td><br><br><br><br><br><br><h5>" .$marca. " </h5></td>" ;
      echo "<td><br><br><br><br><br><br><h5>" .$modello. " </h5></td>" ;
      ?>
      <td> <img src=".\immagini\<?php echo $array['img'];?>" class="foto" > </td>
      <?php
      echo "<td><br><br><br><br><br><br><h5>" .$prezzo. " € </h5></td>" ;
       
    echo "<form method=\"POST\" action=\"vendita.php?modello=".$modello."\" >";
    echo "<td> <br><br><br><br><br><br> <input type=\"submit\" name=\"aggCarrello\" value=\"VISUALIZZA\" /></td>";
    echo "</form>";


   echo "</tr>";
    }

   
  ?>

   
  </tbody>
  </table>


  <br><br><br><br><br><br><br>


  <?php
  require 'footer2.php';
  ?>

</body>

</html>
