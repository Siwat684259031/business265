<?php
require "connect.php";

$CustomerID = $_GET['CustomerID'];

$sql = "SELECT * FROM customer WHERE CustomerID = :CustomerID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID',$CustomerID);
$stmt->execute();

$customer = $stmt->fetch();
?>

<h2>แก้ไขข้อมูลลูกค้า</h2>

<form action="updateCustomerDB.php" method="post">

<input type="hidden" name="CustomerID" value="<?= $customer['CustomerID'] ?>">

ชื่อ :
<input type="text" name="Name" value="<?= $customer['Name'] ?>"><br><br>

Email :
<input type="text" name="Email" value="<?= $customer['Email'] ?>"><br><br>

OutstandingDebt :
<input type="number" name="OutstandingDebt" value="<?= $customer['OutstandingDebt'] ?>"><br><br>

<button type="submit">บันทึก</button>

</form>