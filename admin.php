<?php
include 'config.php'; // A konfigurációs fájl importálása, amiben van a $pdo példány

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add-book"])) {
  $title = $_POST["title"];
  $author = $_POST["author"];
  $genre = $_POST["genre"];
  $description = $_POST["description"];

  // SQL lekérdezés az új könyv beszúrásához
  $sql = "INSERT INTO konyvek (cim, szerzo, mufaj, leiras) VALUES (:title, :author, :genre, :description)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':author', $author, PDO::PARAM_STR);
  $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);

  if ($stmt->execute()) {
    echo "<p>A könyv hozzáadása sikeres volt.</p>";
  } else {
    echo "<p>Hiba történt a könyv hozzáadása során.</p>";
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete-user"])) {
  $userId = $_POST["user-id"];

  // SQL lekérdezés a felhasználó törléséhez
  $sql = "DELETE FROM felhasznalok WHERE id = :userId";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

  if ($stmt->execute()) {
    echo "<p>A felhasználó törlése sikeres volt.</p>";
  } else {
    echo "<p>Hiba történt a felhasználó törlése során.</p>";
  }
}

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["view"]) && $_GET["view"] === "borrowed") {
  // SQL lekérdezés a kikölcsönzött könyvek lekérdezéséhez
  $sql = "SELECT konyvek.cim, konyvek.szerzo, felhasznalok.username, kolcsonzesek.kezdeti_datum, kolcsonzesek.lejarati_datum FROM kolcsonzesek
          JOIN konyvek ON kolcsonzesek.konyv_id = konyvek.id
          JOIN felhasznalok ON kolcsonzesek.felhasznalo_id = felhasznalok.id";

  $stmt = $pdo->query($sql);
  $borrowedBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Kölcsönzött könyvek listázása egy táblázatban
  echo '<table>';
  echo '<tr><th>Könyv címe</th><th>Szerző</th><th>Felhasználó</th><th>Kezdeti dátum</th><th>Lejárati dátum</th></tr>';
  foreach ($borrowedBooks as $book) {
    echo '<tr>';
    echo '<td>' . $book['cim'] . '</td>';
    echo '<td>' . $book['szerzo'] . '</td>';
    echo '<td>' . $book['username'] . '</td>';
    echo '<td>' . $book['kezdeti_datum'] . '</td>';
    echo '<td>' . $book['lejarati_datum'] . '</td>';
    echo '</tr>';
  }
  echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adminisztráció - Könyvkölcsönző</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <!-- Menüpontok a különböző admin funkciókhoz -->
    <nav>
      <ul>
        <li><a href="admin.php">Új könyv hozzáadása</a></li>
        <li><a href="admin.php?view=books">Könyvek listázása</a></li>
        <li><a href="admin.php?view=users">Felhasználók listázása</a></li>
        <li><a href="admin.php?view=borrowed">Kikölcsönzött könyvek</a></li>
        <li><a href="index.php">Főoldal</a></li>
        <li><a href="logout.php">Kilépés</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Adminisztráció</h1>
    <?php
      if (isset($_GET['view']) && $_GET['view'] == 'books') {
        // Könyvek listázása
        // Implementáld a könyvek lekérdezését és listázását
      } elseif (isset($_GET['view']) && $_GET['view'] == 'users') {
        // Felhasználók listázása
        // Implementáld a felhasználók lekérdezését és listázását
      } elseif (isset($_GET['view']) && $_GET['view'] == 'borrowed') {
        // Kikölcsönzött könyvek listázása
        // Implementáld a kikölcsönzött könyvek lekérdezését és listázását
      } else {
        // Új könyv hozzáadása űrlap
        echo '
          <section id="add-book">
            <h2>Új könyv hozzáadása</h2>
            <form action="admin.php" method="post">
              <!-- Könyv adatainak bekérése -->
            </form>
          </section>
        ';
      }
    ?>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Könyv molyoknak</p>
  </footer>
</body>
</html>
