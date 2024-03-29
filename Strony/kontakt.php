<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="icon" href="../ikona/ikona.png" type="image/png">
    <link rel="stylesheet" href="../css/kontakt.css">
    <link rel="stylesheet" href="../css/nawigacja.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@500&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <img id="logo" src="../zdjęcia/logoStrona.png" alt="Audi" />
        <nav id="main-nav">
          <ul>
            <li><a href="../index.php">Strona główna</a></li>
            <li><a href="./modele.php">Modele</a></li>
            <li><a href="./galeria.php">Galeria</a></li>
            <li><a href="./kontakt.php">Kontakt</a></li>
            <li><a href="./logowanie.php">Zaloguj się</a></li>
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
    <div id="title">
        <h1>Gdzie nas znaleźć</h1>
    </div>
    <iframe
        src="https://www.openstreetmap.org/export/embed.html?bbox=21.021392047405246%2C52.22851736561242%2C21.0248413681984%2C52.22965915931923&amp;layer=mapnik&amp;marker=52.229088266136415%2C21.02311670780182"
        id="Map"></iframe><br />
    <div id="testowanie">
        <h1 class="daneKontaktu">Kontakt</h1>
        <p class="daneKontaktu"><b>Telefon: </b>22 223 15 90</p>
        <p class="daneKontaktu"><b>Adres: </b>plac Trzech Krzyży 10/14, 00-499 Warszawa</p>
        <p class="daneKontaktu"><b>Strona: </b></p><a href="https://audicitywarszawa.pl/" id="link">
            <p class="daneKontaktu">audicitywarszawa.pl </p>
        </a>
    </div>
    <script rel="text/javascript" src="../js/mapa.js"></script>
    <script rel="text/javascript" src="../js/nawigacja.js"></script>
</body>

</html>