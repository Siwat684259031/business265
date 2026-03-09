<?php
    require "connect.php";

    $sql_c = "SELECT *
    FROM customer,country
    WHERE customer.CountryCode = country.CountryCode
    AND CustomerID = :CID";

    $stmt_customer = $conn->prepare($sql_c);
    $stmt_customer->bindParam(':CID', $_GET['CustomerID']);
    $stmt_customer->execute();
    $result_customer = $stmt_customer->fetch(PDO::FETCH_ASSOC);

    $sql_country = "SELECT * FROM country";
    $stmt_c = $conn->prepare($sql_country);
    $stmt_c->execute();
    $cc = $stmt_c->fetchAll(PDO::FETCH_ASSOC);

    $selected = $result_customer['CountryCode']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Update Customer</title>
</head>

<body>

    <h2>แก้ไขข้อมูลลูกค้า</h2>

    <form action="updateCustomerDB_stu.php" method="POST">

    <label>รหัสลูกค้า :</label>
    <input type="text" name="CustomerID"
    value="<?= $result_customer['CustomerID'] ?>" readonly>
    <br><br>

    <label>ชื่อ :</label>
    <input type="text" name="Name"
    value="<?= $result_customer['Name'] ?>">
    <br><br>

    <label>วันเกิด :</label>
    <input type="date" name="Birthdate"
    value="<?= $result_customer['Birthdate'] ?>">
    <br><br>

    <label>Email :</label>
    <input type="email" name="Email"
    value="<?= $result_customer['Email'] ?>">
    <br><br>

    <label>ยอดหนี้ :</label>
    <input type="number" name="OutstandingDebt"
    value="<?= $result_customer['OutstandingDebt'] ?>">
    <br><br>

    <label>ประเทศ :</label>

    <select name="CountryCode">

<?php
    foreach ($cc as $c) {

    if ($selected == $c['CountryCode']) {

        echo '<option selected value="'.$c['CountryCode'].'">'.$c['CountryName'].'</option>';

    } else {

        echo '<option value="'.$c['CountryCode'].'">'.$c['CountryName'].'</option>';

    }

}
?>

</select>

<br><br>

<input type="submit" value="บันทึก">

</form>

</body>
</html>