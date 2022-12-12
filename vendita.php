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
            <?php 
             if(isset($_SESSION['email'])){

            ?>
            <a class="nav-link" href="carrello.php">CARRELLO</a>
          </li>
          <?php } ?> 

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


  <div id="corpo">

<?php

$modello=$_GET['modello'];

  $query="SELECT * FROM prodotti WHERE modello='".$modello."'";
  $result = mysqli_query($conn,$query);

  while($array=$result->fetch_assoc()) {

      if(isset($_REQUEST['aggCarrello'])) {

      $idProdotto=$array['idProdotto'];
      $marca=$array['marca'];
      $prezzo=$array['prezzo'];
      $quantita=1;

      //ordine associato ad email
      if(isset($_SESSION['email'])) {

      $idOrdine=$_SESSION['email'];

      $query1="SELECT * FROM utenti WHERE email='".$_SESSION['email']."'";
      $result1 = mysqli_query($conn,$query1);
    
      while($array1=$result1->fetch_assoc()) {
        
        echo("<h3><center><br>Ciao, ".$array1['nome']."<br><br></center></h3>");
      }

      }else{
        echo "<h4><strong>Per aggiungere questo prodotto al carrello<br>Devi aver effettuato il login<br><br></strong></h4>";
      }

echo "<h4><strong>Stai Guardando : </strong></h4>";
echo "<br/>";
echo "<h4><strong>MODELLO : </strong>".$array['modello']."</h4>";
echo "<br/>";
echo "<h4><strong>PREZZO : </strong>".$array['prezzo']." € </h4>";
echo "<br/>";

?>
<td> <div id="immagine"><img src=".\immagini\<?php echo $array['img'];?>" width="400" height="300"></div></td>
<?php

echo "<br/>";
echo "<h4><strong>Inserisci nella casella sottostante la quantità che vuoi ordinare</strong></h4><br>";

echo "<form method=\"POST\" action=\"vendita_Serv.php?modello=".$modello."\" >";
?>

<h4><label for="quantity">Quantita (1-99):</label>
<input type="number" id="quantita" name="quantita" min="1" max="99" required></h4><br>

<h4><label for="taglia">Taglia:</label>
<input type="range" id="taglia" name="taglia" value="35" min="35" max="45" oninput="this.nextElementSibling.value = this.value" required>
<output>35</output>
<br><br><br>

<?php
 echo "<input type=\"submit\" name=\"insert\" value=\"AGGIUNGI AL CARRELLO\" /><br/>";
 echo "</form>";

 echo "<br><br><br><br>";

    }
  }

  if(!$result){

    die('Query non riuscita' .mysqli_error($conn));
  }

  ?>

</div>

</body>

<?php require 'footer2.php'; ?>

</html>
