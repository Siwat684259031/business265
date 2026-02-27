<?php
$servername = "localhost";
$useername = "root";
$password = "";
$dbname = "business";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $useername, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
}
