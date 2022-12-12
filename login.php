<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>SneakHeadz</title>
  </head>

<body style="background-image: url('immagini/s4.jpg');
  background-repeat: no-repeat;
	background-size: cover;
	margin: 0;">

    <header class="site-header">

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


</header>

<br><br><br><br><br><br>
<h3 style="text-align: center;">Inserisci i tuoi dati nel form sottostante per effettuare il login</h3>

<main class="container" style="width: 40%;">

  <br><br>
  <form method="post" action="loginServ.php">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div><br>
    <button type="submit" class="btn btn-primary" >Accedi</button>
  </form>


</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php
    require 'footer.php';
    ?>

  </body>
</html>
