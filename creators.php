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
   
          $creators = array(
            array(
              "name" => "Készítő neve 1",
              "description" => "Leírás vagy információ a készítőről 1.",
              "image" => "creator1.jpg",
            ),
            array(
              "name" => "Készítő neve 2",
              "description" => "Leírás vagy információ a készítőről 2.",
              "image" => "creator2.jpg",
            ),
            array(
              "name" => "Készítő neve 3",
              "description" => "Leírás vagy információ a készítőről 3.",
              "image" => "creator3.jpg",
            )
          );

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
