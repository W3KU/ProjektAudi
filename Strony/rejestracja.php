<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
<div class="register_panel">
    <form action="rejestracja.php" method="post">
        <label for="fname">Imię:</label><br>
        <input type="text" id="fname" name="fname" required><br>

        <label for="lname">Nazwisko:</label><br>
        <input type="text" id="lname" name="lname" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="confirm_password">Potwierdź Hasło:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="Zarejestruj się">
        <a href="logowanie.php">Zaloguj się!</a>
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
$password = ""; 
$dbname = "fabryka";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $conn->real_escape_string($_POST['fname']);
        $lname = $conn->real_escape_string($_POST['lname']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);
        $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

        if ($password == $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$fname', '$lname', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                header("Location: logowanie.php");
                exit();
            }   
            else {
            echo "Błąd: " . $sql . "<br>" . $conn->error;
            }
        } 
        else {
        echo "Hasła się nie zgadzają!";
        }
    }
}
$conn->close();
?>

</body>
</html>