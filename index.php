<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Könyvkölcsönző</title>
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
        <li><a href="creators2.php">Készítők</a></li>
        <li><a href="contact.php">Kapcsolat</a></li>
        <li><a href="admin.php">Adminisztrátor</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="filter">
      <label for="genre">Műfaj szűrés:</label>
      <select id="genre" name="genre">
        <option value="all">Mind</option>
        <option value="fantasy">Fantasy</option>
        <option value="horror">Horror</option>
        <option value="comedy">Komédia</option>
        <option value="sci-fi">Sci-fi</option>
      </select>
    </section>

    <table class="book-table">
      <?php
        // Adatok betöltése a data.php fájlból
        include 'data.php';

        // Könyvek listázása
        foreach ($books as $book) {
          echo "<tr>";
          echo "<td>";
          echo "<div class='book'>";
          echo "<img src='" . $book['cover'] . "' alt='" . $book['title'] . " borítókép'>";
          echo "<h2><a href='book_details.php'>" . $book['title'] . "</a></h2>";
          echo "<p>Szerző: " . $book['author'] . "</p>";
          echo "<p>Műfaj: " . $book['genre'] . "</p>";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </main>

  <!-- JavaScript kód elhelyezése a főoldal alján -->
  <script src="script.js"></script>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Könyv molyoknak</p>
  </footer>
</body>
</html>
