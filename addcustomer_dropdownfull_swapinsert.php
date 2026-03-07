<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>Add customer but not in order of columns</h1>
    <form action="addcustomer_dropdownfull_swapinsert.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="Customer">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="number" placeholder="OutStandirg debt" name="OutStandirgDebt">
        <br><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>

        <select name="CountryCode">
            <?php
            require 'connect.php';

            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) :;
            ?>
                <option value="<?php echo $cc["CountryCode"];  ?>">
                    <?php echo $cc['CountryName']; ?>
                </option>
            <?php
            endwhile;
            ?>
        </select>
        <br><br>

        <input type="submit" value="Submit" name="submit" />
    </form>
</body>

</html>
<?
if (isset($_POST['submit'])) {
    if (!empty($_POST['CountryCode']) && !empty($_POST['name'])) {

        $sql = "insert into customer (CustomerID,Name,Birthdate,Email,CountryCode,OutstandingDebt value (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";
    }
}
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to sdd new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>