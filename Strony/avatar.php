<?php
session_start();

// Sprawdź, czy użytkownik jest zalogowany
if (!isset($_SESSION['userid'])) {
    header("Location: logowanie.php");
    exit();
}

$userId = $_SESSION['userid'];

if (isset($_POST["submit"])) {
    $target_dir = "../avatar"; // Katalog, do którego będą przesyłane pliki
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Sprawdź, czy plik to rzeczywisty obraz
    if(isset($_FILES["avatar"])) {
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
            echo "Plik jest obrazem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Plik nie jest obrazem.";
            $uploadOk = 0;
        }
    }

    // Sprawdź, czy plik już istnieje
    if (file_exists($target_file)) {
        echo "Przepraszamy, plik już istnieje.";
        $uploadOk = 0;
    }

    // Spróbuj przesłać plik
    if ($uploadOk == 0) {
        echo "Przepraszamy, twój plik nie został przesłany.";
    } else {
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            echo "Plik ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " został przesłany.";

            // Aktualizacja ścieżki w bazie danych
            $conn = new mysqli('localhost', 'root', '', 'fabryka');
            if ($conn->connect_error) {
                die("Połączenie nieudane: " . $conn->connect_error);
            }

            $sql = "INSERT INTO avatars (user_id, avatar_path) VALUES (?, ?) ON DUPLICATE KEY UPDATE avatar_path=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $userId, $target_file, $target_file);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Ścieżka avatara zaktualizowana w bazie danych.";
                header("Location: menu.php");
            } else {
                echo "Błąd podczas aktualizacji bazy danych: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            echo "Przepraszamy, wystąpił błąd podczas przesyłania twojego pliku.";
        }
    }
}
?>
