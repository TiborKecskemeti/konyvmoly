<?php
// Indítsa el vagy folytassa a munkamenetet
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
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
    <title>Felhasználói fiók - Könyvkölcsönző</title>
    <link rel="stylesheet" href="styles2.css" />
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Főoldal</a></li>
                <li><a href="book_details.php">Könyvek</a></li>
                <li>
                    <form action="" method="POST">
                        <button type="submit" name="logout">Kilépés</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Felhasználói Fiók</h1>
        <section id="user-profile">
            <h2>Felhasználói adatok</h2>
            <p>Felhasználónév: <span class="user-data">felhasznalonev</span></p>
            <p>E-mail cím: <span class="user-data">pelda@example.com</span></p>
            <!-- További felhasználói adatok... -->
        </section>

        <section id="change-password">
            <h2>Jelszó változtatás</h2>
            <form action="password_change.php" method="post">
                <label for="current-password">Jelenlegi jelszó:</label>
                <input
                    type="password"
                    id="current-password"
                    name="current-password"
                    required
                />
                <label for="new-password">Új jelszó:</label>
                <input
                    type="password"
                    id="new-password"
                    name="new-password"
                    required
                />
                <label for="confirm-password">Új jelszó megerősítése:</label>
                <input
                    type="password"
                    id="confirm-password"
                    name="confirm-password"
                    required
                />
                <button type="submit">Jelszó módosítása</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Könyv molyoknak</p>
    </footer>
</body>
</html>
