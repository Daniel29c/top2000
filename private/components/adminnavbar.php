<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navbarstyle.css">
  <title>Document</title>
  <style>
    .navbar {
      background-color: #DA151A !important;
    }

    body {
      font-family: 'VT323', monospace;
    }

    .bi {
      width: 75px !important;
      height: 75px !important;
    }

    nav {
      font-size: 18px;
      font-weight: 900;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <img src="../img/npo_radio2_top2000_logo.svg" alt="Girl in a jacket" width="100" height="60">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav mr-auto">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="dj_admin.php">Dj</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="artiest_admin.php">artiest</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="nummer_admin.php">nummer</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="stemmers_lijst_admin.php">Stemmers</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="program_admin.php">Programma</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="user_admin.php">Gebruiker</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="../../public/adminpaginas/node/scanner.php">Qr scanner</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="news_admin.php">Nieuws</a>
          </li>
        </ul>
        <ul class="navbar-nav ml  -auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Uitloggen</a>
          </li>
        </ul>
      </div>
  </nav>
</body>

</html>