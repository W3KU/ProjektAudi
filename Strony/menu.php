<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['userid'])) {
    header("Location: logowanie.php"); // Przekieruj na stronę logowania, jeśli nie jest zalogowany
    exit();
}

$userId = $_SESSION['userid'];
$avatarPath = ""; // Zmienna na ścieżkę awatara

// Połączenie z bazą danych
$conn = new mysqli('localhost', 'root', '', 'fabryka');

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobieranie ścieżki awatara
$avatarExists = false;
$sqlAvatar = "SELECT avatar_path FROM avatars WHERE user_id = ?";
$stmtAvatar = $conn->prepare($sqlAvatar);
$stmtAvatar->bind_param("i", $userId);
$stmtAvatar->execute();
$resultAvatar = $stmtAvatar->get_result();

if ($resultAvatar->num_rows > 0) {
  $avatarExists = true; // Awatar istnieje
}
if ($resultAvatar->num_rows > 0) {
    $rowAvatar = $resultAvatar->fetch_assoc();
    $avatarPath = $rowAvatar['avatar_path'];
}
$stmtAvatar->close();

// Pobieranie danych użytkownika
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "Nie znaleziono danych użytkownika.";
}

$conn->close();
?>
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
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body class="backdrop-filter">
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

    <div class="ustawienia">
        <form action="avatar.php" method="post" enctype="multipart/form-data">
          Wybierz zdjęcie do przesłania:
          <input type="file" name="avatar">
          <input type="submit" value="Prześlij Zdjęcie" name="submit"<?php if ($avatarExists) echo 'disabled'; ?>>
        </form>
        <br>
        <?php if ($avatarPath != ""): ?>
    <img src="<?php echo htmlspecialchars($avatarPath); ?>" alt="Avatar" style="width: 250px; height: auto;" />
      <?php else: ?>
      <p>Awatar nie został ustawiony.</p>
      <?php endif; ?>
      <br>
      <?php
    echo "Imię: " . htmlspecialchars($userData['firstname']) . "<br>";
    echo "Nazwisko: " . htmlspecialchars($userData['lastname']) . "<br>";
    echo "Email: " . htmlspecialchars($userData["email"]) . "<br>";
    echo "Data założenia konta: " . htmlspecialchars($userData["reg_date"]) . "<br>";
?>
       <a href="usun.php?user_id=<?php echo $userId; ?>">Usuń konto</a>
       <a href="usun_avatar.php?user_id=<?php echo $avatarPath; ?>" style="float: right;">Usuń awatar</a>
        
    </div>

</body>
</html>
