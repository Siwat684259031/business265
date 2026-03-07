<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>Add customer but not in order of columns</h1>
    <form action="addcustomer_dropdownfull_swapinsert.php" method="POST">

        <label for="fname">Enter Customer ID:</label><br>
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <label for="fname">Enter Name:</label><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <label for="fname">Birthdate:</label><br>
        <input type="date" placeholder="Birthdate" name="Birthdate">
        <br><br>
        <label for="fname">Enter Email:</label><br>
        <input type="email" placeholder="Email" name="Email">
        <br><br>
        <label for="fname">Enter OutstandingDebt:</label><br>
        <input type="number" placeholder="OutStanding debt" name="OutStandingDebt">
        <br><br>
        
        
           <label for="fname">Enter OutstandingDebt:</label><br>
        <select name="CountryCode">
            <?php
            require 'connect.php';

                $sql = "SELECT CountryCode, CountryName FROM country";
                $stmt_s = $conn->prepare($sql);
                $stmt_s->execute();

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
<?php
if (isset($_POST['submit'])) :

require 'connect.php';



$sql = "INSERT INTO customer
(CustomerID, Name, Birthdate, Email, CountryCode, OutStandingDebt)
VALUES
(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutStandingDebt)";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':CustomerID', $_POST['CustomerID']);
$stmt->bindParam(':Name', $_POST['Name']);
$stmt->bindParam(':Birthdate', $_POST['Birthdate']);
$stmt->bindParam(':Email', $_POST['Email']);
$stmt->bindParam(':CountryCode', $_POST['CountryCode']);
$stmt->bindParam(':OutStandingDebt', $_POST['OutStandingDebt']);

if ($stmt->execute()) :
    // redirect back to listing page when insert succeeds
    echo '<script>window.location.href = "index_stu.php";</script>';
else :
    echo "Fail to add new customer";
endif;

$conn = null;

endif;
?>