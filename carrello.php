<!doctype html>
<html lang="en">

<head>
  <?php require 'db_connect.php';
  
  if(isset($_SESSION['email'])){

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

$query1="SELECT * FROM utenti WHERE email='".$_SESSION['email']."'";
$result1 = mysqli_query($conn,$query1);

while($array1=$result1->fetch_assoc()) {

$nomeUt = $array1['nome'];

echo "<br/>";
echo "<h3><strong>Ciao, " .$nomeUt. "<br>gli ordini relativi alla tua e-mail : '".$_SESSION['email']."' sono : </strong></h3>";
echo "<br/><br/>";

$query2="SELECT * FROM carrello WHERE email='".$_SESSION['email']."'";
$result2 = mysqli_query($conn,$query2);

while($array2=$result2->fetch_assoc()) {

$idOrdine = $array2['idCarrello'];
//sarebbe idCarrello
$prezzoTot = $array2['prezzoTot'];

echo "<h5><strong>Ordine n : " .$idOrdine. "</strong></h5><br>";
echo "<h5><strong>Prezzo : " .$prezzoTot. " €</strong></h5><br>";

echo "<br/>";


$query3="SELECT SUM(prezzoTot) FROM carrello WHERE email='".$_SESSION['email']."'";
$result3 = mysqli_query($conn,$query3);

$row = mysqli_fetch_assoc($result3);
$finalPrice = implode(", ", $row);

echo "<h4><strong>Prezzo Totale : ".$finalPrice." €</strong></h4><br>";
echo "<br>";
?>
<?php
echo "<form method=\"POST\" action=\"carrello_Serv.php?finalPrice=".$finalPrice."\" >";
?>
<h5><label for="phone">Inserisci il numero della tua carta di credito :</label>
<input type="tel" id="carta" name="carta" placeholder="1234-1234-1234-1234" pattern="[0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}" required><br><br>
<label for="bdaymonth">Scadenza (mese ed anno):</label>
<input type="month" id="meseScadenza" name="meseScadenza" required><br><br>
<label for="titolareCarta">Nome e Cognome del titolare :</label>
<input type="text" id="titolare" name="titolare" placeholder="Nome e Cognome" required></h5>

<br><br>
<?php
echo "<td> <input type=\"submit\" name=\"vendi\" value=\"CONFERMA L'ORDINE\" /></td>";
echo "</form>";
?>
<?php
} }

if($result2->num_rows==0){

echo "<br/><br/>";
echo "<h3><strong>Il tuo carrello è vuoto :( </strong></h3>";
echo "<br/><br/>";
}
}

?>

</div>

</body>

<?php echo "<br><br><br><br><br><br><br><br><br><br>"; require 'footer2.php'; ?>

</html>
