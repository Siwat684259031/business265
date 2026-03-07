<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add reg</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">


        <label for="fname">Enter Customer ID:</label><br>
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <label for="fname">Enter Name:</label><br>
        <input type="text" placeholder="Name" name="Name">
        <br> <br>
        <label for="fname">Birthdate:</label><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br> <br>
        <label for="fname">Enter Email:</label><br>
        <input type="Email" placeholder="Email" name="Email">
        <br> <br>
        <label for="fname">Enter CountryName:</label><br>
        <input type="text" placeholder="CountryCode" name="CountryCode">
        <br> <br>
        <label for="fname">Enter OutstandingDebt:</label><br>
        <input type="text" placeholder="OutstandingDebt" name="OutstandingDebt">
        <br> <br>
        <input type="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])):
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['Birthdate'] . $_POST['Email'] . $_POST['CountryCode'] . $_POST['OutstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";

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