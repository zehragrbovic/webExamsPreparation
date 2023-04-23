<?php

$servername = "localhost";
$username = "root";
$password = "root";
$schema = "midterm-prep1";

//private $conn;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // Flight::set("connection", $conn);
    echo "CONNECTED";

    $stmt = $conn->prepare("SELECT * FROM country");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

} catch(PDOException $e) {
    echo "FAILED" . $e->getMessage();
}

?>