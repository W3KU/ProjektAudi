<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona audi</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slajdy.css">
    <link rel="stylesheet" href="css/nawigacja.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" href="ikona/ikona.png" type="image/png">

</head>

<body>
    <header>
        <img id="logo" src="zdjęcia/logoStrona.png" alt="Audi" />
        <nav id="main-nav">
            <ul>
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="Strony/modele.php">Modele</a></li>
                <li><a href="Strony/galeria.php">Galeria</a></li>
                <li><a href="Strony/kontakt.php">Kontakt</a></li>
                <li><a href="Strony/logowanie.php">Zaloguj się</a></li>
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
    <div class="container">
        <div class="section-stick">
            <div class="stick active"></div>
        </div>
        <div class="section s1">
            <video autoplay muted loop id="myVideo">
                <source src="./Filmy/1920x1080_Q4-e-tron_02.mp4" type="video/mp4">
            </video>
            <div class="video-container">
                <div id="opisQ4">
                    <h3>Audi Q4 e-tron</h3>
                    <p>Nowy Audi Q4 e-tron to pierwszy model w historii marki, który został zaprojektowany jako samochód
                        w
                        pełni elektryczny.
                        To kompaktowy SUV, który łączy w sobie sportowy charakter, funkcjonalność i zasięg na poziomie
                        do
                        520 km (WLTP).</p>
                    <a href="https://www.audi.pl/pl/web/pl/q4-e-tron-moj-elektryk.html" id="moreQ4">
                        Dowiedz się więcej
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/slides.js"></script>
    <script src="js/nawigacja.js"></script>
</body>

</html>