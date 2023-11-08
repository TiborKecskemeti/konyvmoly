<?php
// Adatbázis kapcsolat létrehozása
$servername = "localhost";
$username = "felhasznalo_neve"; // Helyettesítsd a valós adatbázis felhasználó nevével
$password = "jelszo"; // Helyettesítsd a valós adatbázis jelszavával
$dbname = "adatbazis_neve"; // Helyettesítsd a valós adatbázis nevével

$conn = new mysqli($servername, $username, $password, $dbname);

// Adatbázis kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Sikertelen kapcsolat az adatbázishoz: " . $conn->connect_error);
}

// Bejelentkezési űrlap feldolgozása
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Felhasználó azonosítása az adatbázisban
    $sql = "SELECT id, username, password FROM felhasznalok WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Sikeres bejelentkezés
        session_start();
        $_SESSION["username"] = $username;
        header("Location: felhasznaloi_fiok.php"); // Az átirányítást a felhasználói fiók oldalra
    } else {
        // Sikertelen bejelentkezés
        $error_message = "Hibás felhasználónév vagy jelszó!";
    }
}

// Adatbázis kapcsolat bezárása
$conn->close();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Könyvkölcsönző</h1>
        <nav>
            <ul>
                <li><a href="index.html">Főoldal</a></li>
                <li><a href="book_details.html">Könyvek</a></li>
                <li><a href="#">Felhasználói fiók</a></li>
                <li><a href="login.php">Bejelentkezés</a></li>
                <li><a href="#">Regisztráció</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="login">
            <h2>Bejelentkezés</h2>
            <form action="login.php" method="POST">
                <label for="username">Felhasználónév:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Jelszó:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" value="Bejelentkezés">
            </form>
            <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Könyv molyoknak</p>
    </footer>
</body>
</html>
