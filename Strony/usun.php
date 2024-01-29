<?php
session_start();

// Upewnij się, że użytkownik jest zalogowany i że ID jest przekazane
if (!isset($_SESSION['userid']) || !isset($_GET['user_id'])) {
    header("Location: logowanie.php");
    exit();
}

$userIdToDelete = $_GET['user_id'];

// Dodatkowe zabezpieczenie: sprawdź, czy ID do usunięcia jest zgodne z ID zalogowanego użytkownika
if ($_SESSION['userid'] != $userIdToDelete) {
    die("Błąd autoryzacji.");
}

// Połączenie z bazą danych
$conn = new mysqli('localhost', 'root', '', 'fabryka');

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}
// Pobierz ścieżkę pliku awatara
$sqlPath = "SELECT avatar_path FROM avatars WHERE user_id = ?";
$stmtPath = $conn->prepare($sqlPath);
$stmtPath->bind_param("i", $userIdToDelete);
$stmtPath->execute();
$resultPath = $stmtPath->get_result();
if ($resultPath->num_rows > 0) {
    $rowPath = $resultPath->fetch_assoc();
    $avatarPath = $rowPath['avatar_path'];

    // Usuń plik awatara, jeśli istnieje
    if (file_exists($avatarPath)) {
        unlink($avatarPath);
    }
}
$stmtPath->close();
// Najpierw usuń wpis awatara z bazy danych
$sqlAvatar = "DELETE FROM avatars WHERE user_id = ?";
$stmtAvatar = $conn->prepare($sqlAvatar);
$stmtAvatar->bind_param("i", $userIdToDelete);
$stmtAvatar->execute();
$stmtAvatar->close();



// Usuwanie konta
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userIdToDelete);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Konto zostało usunięte.";
    session_destroy(); // Zniszcz sesję, ponieważ konto zostało usunięte
    header("Location: logowanie.php");
} else {
    echo "Błąd podczas usuwania konta.";
}

$conn->close();
?>