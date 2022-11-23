<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>SneakHeadz</title>
</head>
<body>
  <header class="site-header">

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
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
    <form method="post" action="registrazione_Serv.php">
      <br><br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
          <label for="cognome">Cognome</label>
          <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome">
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <br>
      <button type="submit" class="btn btn-primary">Registra</button>
    </form>
  </main>
  <?php
  require 'footer.php';
  ?>
