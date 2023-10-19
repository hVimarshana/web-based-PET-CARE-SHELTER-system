<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'petcaretestv1';

try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT date, amount FROM daily_sales";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the connection
    $con = null;

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
