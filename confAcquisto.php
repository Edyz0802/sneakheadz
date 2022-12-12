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

echo("<br><br><br><br><br><br><br>");

  if(isset($_SESSION['email'])){

  $query1="SELECT * FROM utenti WHERE email='".$_SESSION['email']."'";
  $result1 = mysqli_query($conn,$query1);

  while($array1=$result1->fetch_assoc()) {
    
    echo("<h1><center><br>Ciao, ".$array1['nome']."<br><br>Grazie per aver acquistato da SneakHeadz<br><br>Il tuo ordine verrà processato a breve<br></center></h1>");
  }
  }
  else{
    echo("<h1><center><br>Benvenuto Utente Sconosciuto<br></center></h1>");
  }
   
  echo("<br><br><br><br><br>");

  require 'footer.php';
  ?>

</body>

</html>
