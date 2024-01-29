<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['userid'])) {
    header("Location: logowanie.php");
    exit();
}

$userId = $_SESSION['userid'];

$conn = new mysqli('localhost', 'root', '', 'fabryka');
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Najpierw pobierz ścieżkę awatara
$sqlPath = "SELECT avatar_path FROM avatars WHERE user_id = ?";
$stmtPath = $conn->prepare($sqlPath);
$stmtPath->bind_param("i", $userId);
$stmtPath->execute();
$resultPath = $stmtPath->get_result();

if ($resultPath->num_rows > 0) {
    $rowPath = $resultPath->fetch_assoc();
    $avatarPath = $rowPath['avatar_path'];
}

$stmtPath->close();

// Usuń wpis awatara z bazy danych
$sqlAvatar = "DELETE FROM avatars WHERE user_id = ?";
$stmtAvatar = $conn->prepare($sqlAvatar);
$stmtAvatar->bind_param("i", $userId);
$stmtAvatar->execute();
$stmtAvatar->close();

// Teraz usuń plik awatara, jeśli istnieje
if (isset($avatarPath) && file_exists($avatarPath)) {
    unlink($avatarPath);
}

header("Location: menu.php");
exit();
?>
