<!doctype html>
<html lang="en">
<head>
  <?php require 'db_connect.php';
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css">

  <title>SneakHeadz</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SneakHeadz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registrazione.php">REGISTRAZIONE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="store.php">STORE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout_Serv.php">LOGOUT</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <?php
    echo($_SESSION['email']);
  ?>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Modello</th>
      <th scope="col">Foto</th>
      <th scope="col">Prezzo</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td> Nike </td>
      <td> Dunk panda </td>
      <td> <img src="./immagini/panda.jpg" class="foto" ></td>
      <td>150$</td>
      <td>
        
        <form method="post" action="dunkPanda.php">

        <button type="submit" class="btn">VISUALIZZA</button>

        </form>

      </td>


    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>






  <?php
  require 'footer.php';
  ?>
</body>

</html>
