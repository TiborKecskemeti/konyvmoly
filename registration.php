<?php
include 'config.php';

// Alapvető változók inicializálása
$username = $email = $password = $confirmPassword = '';
$usernameError = $emailError = $passwordError = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Űrlap adatok ellenőrzése
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $isValid = true;

    // Ellenőrizzük a felhasználónév hosszát és meglétét
    if (empty($username)) {
        $usernameError = "Felhasználónév kötelező";
        $isValid = false;
    } elseif (strlen($username) < 3) {
        $usernameError = "Felhasználónév legalább 3 karakter hosszú kell legyen";
        $isValid = false;
    }

    // Ellenőrizzük az e-mail cím érvényességét és meglétét
    if (empty($email)) {
        $emailError = "E-mail cím kötelező";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Érvénytelen e-mail cím formátum";
        $isValid = false;
    }

    // Ellenőrizzük a jelszavak egyezőségét
    if ($password !== $confirmPassword) {
        $passwordError = "A jelszavak nem egyeznek meg";
        $isValid = false;
    }

    if ($isValid) {
        // Jelszó hashelése
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Regisztráció az adatbázisba
        try {
            $stmt = $pdo->prepare("INSERT INTO felhasznalok (username, email,
password) VALUES (:username, :email, :password)"); $stmt->bindParam(':username',
$username, PDO::PARAM_STR); $stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
$stmt->execute(); echo "
<p>Regisztráció sikeres!</p>
"; } catch (PDOException $e) { echo "
<p>Hiba történt a regisztráció során. Kérjük, próbáld újra később.</p>
"; } } } ?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Regisztráció - Könyvkölcsönző</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="index.php">Főoldal</a></li>
          <li><a href="book_details.php">Könyvek</a></li>
          <li><a href="user.php">Felhasználói fiók</a></li>
          <li><a href="login.php">Bejelentkezés</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <h1>Regisztráció</h1>
      <section id="registration-form">
        <form action="registration.php" method="post">
          <label for="username">Felhasználónév:</label>
          <input
            type="text"
            id="username"
            name="username"
            required
            value="<?php echo $username; ?>"
          />
          <span class="error"><?php echo $usernameError; ?></span>
          <label for="email">E-mail cím:</label>
          <input
            type="email"
            id="email"
            name="email"
            required
            value="<?php echo $email; ?>"
          />
          <span class="error"><?php echo $emailError; ?></span>
          <label for="password">Jelszó:</label>
          <input type="password" id="password" name="password" required />
          <label for="confirm-password">Jelszó megerősítése:</label>
          <input
            type="password"
            id="confirm-password"
            name="confirm-password"
            required
          />
          <span class="error"><?php echo $passwordError; ?></span>
          <button type="submit">Regisztráció</button>
        </form>
      </section>
    </main>

    <footer>
      <p>
        &copy;
        <?php echo date("Y"); ?>
        Könyv molyoknak
      </p>
    </footer>
  </body>
</html>
