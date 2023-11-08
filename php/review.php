<?php
include 'config.php';
// Adatbázis kapcsolódás
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "book_reviews";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
}

// Értékelés hozzáadása
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookId = $_POST["book_id"];
    $userName = $_POST["user_name"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];

    $sql = "INSERT INTO reviews (book_id, user_name, rating, comment) VALUES ('$bookId', '$userName', '$rating', '$comment')";

    if ($conn->query($sql) === TRUE) {
        echo "Az értékelés sikeresen hozzáadva.";
    } else {
        echo "Hiba az értékelés hozzáadásakor: " . $conn->error;
    }
}

// Értékelések lekérdezése a könyv azonosító alapján
if (isset($_GET["book_id"])) {
    $bookId = $_GET["book_id"];
    $sql = "SELECT * FROM reviews WHERE book_id = '$bookId'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $reviews = array();
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
        echo json_encode($reviews);
    } else {
        echo "Nincsenek értékelések.";
    }
}

$conn->close();
?>
