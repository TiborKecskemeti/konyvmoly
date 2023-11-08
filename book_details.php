<?php
  $bookTitle = "Könyv címe";
  $authorName = "Szerző neve";
  $averageRating = 4.5;
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Könyv Részletek</title>
    <link rel="stylesheet" href="styles2.css" />
  </head>
  <body>
    <header>
      <h1>Könyv Részletek</h1>
      <nav>
        <ul>
          <li><a href="index.php">Főoldal</a></li>
          <li><a href="logout.php">Kilépés</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <section id="book_details">
        <img src="book_cover.jpg" alt="Könyv borítóképe" />
        <h2>Cím: <?php echo $bookTitle; ?></h2>
        <p>Szerző: <?php echo $authorName; ?></p>
        <p>Műfaj: Fantasy</p>
        <p>
          Leírás: Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Nullam a libero id tellus gravida bibendum. Vestibulum ante ipsum
          primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc
          semper risus in vestibulum.
        </p>
        <p>Átlagos értékelés: <?php echo $averageRating; ?></p>

        <!-- Értékelési űrlap -->
        <form id="rating-form">
          <label for="rating">Értékelés (0-10):</label>
          <input
            type="number"
            id="rating"
            name="rating"
            min="0"
            max="10"
            step="0.1"
            required
          />
          <button type="submit">Értékelés</button>
        </form>

        <!-- Korábbi értékelések listázása -->
        <section id="ratings">
          <h3>Korábbi értékelések:</h3>
          <ul>
            <li>Felhasználó 1: 4.0</li>
            <li>Felhasználó 2: 5.0</li>
            <!-- További értékelések... -->
          </ul>
        </section>
      </section>
    </main>

    <footer>
      <p>&copy; <?php echo date("Y"); ?> Könyv molyoknak</p>
    </footer>
  </body>
</html>
