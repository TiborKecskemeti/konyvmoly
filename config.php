<?php
$host = 'localhost';
$dbname = 'konyvmolyok';
$username = 'root';
$password = '';
$database1 = "book_reviews";
$database2 = "konyvkolcsonzo";
$database3 = "review";

try {
    // Kapcsolódás az adatbázishoz
    $pdo1 = new PDO("mysql:host=$servername;dbname=$database1", $username, $password);
    $pdo2 = new PDO("mysql:host=$servername;dbname=$database2", $username, $password);
    $pdo3 = new PDO("mysql:host=$servername;dbname=$database3", $username, $password);

    // PDO kivétel üzemmód beállítása
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // A karakterkódolás beállítása UTF-8-ra
    $pdo1->exec("set names utf8");
    $pdo2->exec("set names utf8");
} catch(PDOException $e) {
    // Hiba esetén hibaüzenet kiírása
    echo "Hiba: " . $e->getMessage();
}
?>

