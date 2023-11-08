<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Készítők</title>
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
          <li><a href="registration.php">Regisztráció</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="creators">
        <h2>Készítők</h2>
        <?php
          // Adatbázis kapcsolat létrehozása:
          $dsn = 'mysql:host=localhost;dbname=konyvmolyoknak';
          $username = 'root';
          $password = '';

          try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch (PDOException $e) {
            die('Kapcsolódási hiba: ' . $e->getMessage());
          }

          // Készítők adatainak lekérdezése az adatbázisból:
          $sql = "SELECT * FROM creators";
          $stmt = $pdo->query($sql);
          $creators = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Készítők adatainak kiíratása:
          foreach ($creators as $creator) {
            echo '<div class="creator">';
            echo '<img src="' . $creator["image"] . '" alt="' . $creator["name"] . '" />';
            echo '<h3>' . $creator["name"] . '</h3>';
            echo '<p>' . $creator["description"] . '</p>';
            echo '</div>';
          }
        ?>
      </section>
    </main>

    <footer>
      <p>&copy; <?php echo date("Y"); ?> Könyv molyoknak</p>
    </footer>
  </body>
</html>
