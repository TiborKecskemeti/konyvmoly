<?php
require 'config.php';
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizze a felhasználónév és jelszó kombinációt
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // Az érvényes felhasználónév és jelszó
    $validUsername = "Tibor";
    $validPassword = "1022";

    if ($inputUsername === $validUsername && $inputPassword === $validPassword) {
        // Sikeres bejelentkezés
        // Itt átirányíthatod a felhasználót a főoldalra vagy más oldalra
        header("Location: index.php");
        exit();
    } else {
        // Sikertelen bejelentkezés
        echo "Hibás felhasználónév vagy jelszó!";
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<header>
    <h1>Könyvkölcsönző</h1>
    <nav>
        <ul>
            <li><a href="index.php">Főoldal</a></li>
            <li><a href="registration.php">Regisztráció</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="login">
        <h2>Bejelentkezés</h2>
        <form action="login.php" method="POST">
            <label for="username">Felhasználónév:</label>
            <input type="text" id="username" name="username" required />
            <br />
            <label for="password">Jelszó:</label>
            <input type="password" id="password" name="password" required />
            <br />
            <input type="submit" value="Bejelentkezés" />
        </form>
    </section>
</main>

<footer>
    <p>&copy; 2023 Könyv molyoknak</p>
</footer>
</body>
</html>
