<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="icon" href="ikona/ikona.png" type="image/png">
    <link rel="stylesheet" href="../css/nawigacja.css">
    <link rel="stylesheet" href="../css/logowanie.css">
</head>
<body>
    <header>
        <img id="logo" src="../zdjęcia/logoStrona.png" alt="Audi"/>
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
    
<div class="panel">
    <form action="logowanie.php" method="post">
        <label for="email">Adres Email:</label>
        <input type="text" id="email" name="email">
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password">
        <div class="lower">
            <input type="checkbox"><label class="check" for="checkbox">Zapamiętaj mnie!</label>
            <input type="submit" value="Login" id="loginBtn">
            <a href="rejestracja.php">Zarejestruj się!</a>
        </div>
    </form>
</div>
<footer>
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section about">
                <h4 class="logo-text"><span>Wojciech </span>Matysiak</h4>
                <p>
                    Zostałem zmuszony do zrobienia tej strony ಥ_ಥ.
                </p>
                <div class="contact">
                    <span><i class="material-symbols-outlined">phone</i> &nbsp; 123-456-789</span>
                    <span><i class="material-symbols-outlined">mail</i> &nbsp; przykładowymail@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="../js/nawigacja.js"></script>
    <script src="../jq/submit.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php
$servername = "localhost";
$username = "root";
$password = ""; // Twoje hasło do bazy danych (jeśli istnieje)
$dbname = "fabryka";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Przygotowanie zapytania SQL
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        // Wykonanie zapytania
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Weryfikacja hasła
            if (password_verify($password, $row['password'])) {
                echo "<script>alert('Logowanie pomyślne!');</script>";
                session_start();
                $_SESSION['userid'] = $row['id'];
                header("Location: menu.php");
            } 
            else 
            {
                echo "Nieprawidłowe hasło!";
            }
        } 
        else 
        {
            echo "Nie znaleziono użytkownika!";
        }
    $stmt->close();
    }
}
$conn->close();
?>

</body>
</html>