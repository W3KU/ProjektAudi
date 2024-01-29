<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" href="ikona/ikona.png" type="image/png">
    <link rel="stylesheet" href="../css/galeria.css">
    <link rel="stylesheet" href="../css/nawigacja.css">
</head>
<body>
    <header>
        <img id="logo" src="../zdjęcia/logoStrona.png" />
        <nav id="main-nav">
          <ul>
            <li><a href="../index.php">Strona główna</a></li>
            <li><a href="modele.php">Modele</a></li>
            <li><a href="galeria.php">Galeria</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="logowanie.php">Zaloguj się</a></li>
            <li>
              <div id="search">
                <a href="https://theuselessweb.com/">
                  <span class="material-symbols-outlined">
                    search
                  </span>
                </a>
              </div>
            </li>
          </ul>
        </nav>
      </header>
    <div class="images">
        <img src="/zdjęcia/j.jpg" alt="zdjęcie1">
        <img src="/zdjęcia/2.jpg" alt="zdjęcie2">
    </div>
    
        <input id="przyciskJQ" type="button" value="Tęcza">
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../jq/przycisk.js"></script>
    <script src="../js/nawigacja.js"></script>
</body>
</html>