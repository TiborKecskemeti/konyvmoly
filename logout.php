<?php
require 'config.php';
?>

<?php
// Indítsa el vagy folytassa a munkamenetet
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrizze, hogy a felhasználó be van-e jelentkezve (például a munkamenet változó alapján)
    if (isset($_SESSION["username"])) {
        // Munkamenet lezárása
        session_destroy();
        // Átirányítás a bejelentkezési oldalra
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kilépés - Könyvkölcsönző</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="book_details.php">Könyvek</a></li>
                <li><a href="user.php">Felhasználói fiók</a></li>
                <li><a href="logout.php">Kilépés</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Kilépés</h1>
        <section id="logout-section">
            <p>Biztosan ki szeretnél jelentkezni?</p>
            <form action="logout.php" method="POST">
                <button id="logout-button" type="submit">Kilépés</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Könyv molyoknak</p>
    </footer>
</body>
</html>
