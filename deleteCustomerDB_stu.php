<?php
require "connect.php";

echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


if (isset($_GET['CustomerID'])) {
    $CustomerID = $_GET['CustomerID'];

    try {
        $stmt = $conn->prepare("DELETE FROM customer WHERE CustomerID = :CustomerID");
        $stmt->bindParam(':CustomerID', $CustomerID);
        $stmt->execute();
    } catch (Exception $e) {
    }
}

header('Location: index_stu.php');
exit;
