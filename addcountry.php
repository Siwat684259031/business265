<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add country</title>
</head>

<body>
    <h1>Add Country</h1>
    <form action="addcountry.php" method="POST">

        <label for="fname">Enter CountryCode:</label><br>
        <input type="text" placeholder="CountryCode" name="CountryCode">
        <br> <br>
        <label for="fname">Enter CountryName:</label><br>
        <input type="text" placeholder="CountryName" name="CountryName">
        <br> <br>

        <input type="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['CountryCode']) && isset($_POST['CountryName'])):
    echo "<br>" . $_POST['CountryCode'] . $_POST['CountryName'];

    require 'connect.php';

    $sql = "insert into country values(:CountryCode, :CountryName)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':CountryName', $_POST['CountryName']);


    if ($stmt->execute()):
        $message = 'Suscessfully add new country';
    else :
        $message = 'Fail to sdd new country';
    endif;
    echo $message;
    $conn = null;
endif;
?>