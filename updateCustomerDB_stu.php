<?php
require "connect.php";

if (isset($_POST['CustomerID'])) {

    $CustomerID      = $_POST['CustomerID'];
    $Name            = $_POST['Name'];
    $Birthdate       = $_POST['Birthdate'];
    $Email           = $_POST['Email'];
    $OutstandingDebt = $_POST['OutstandingDebt'];
    $CountryCode     = $_POST['CountryCode'];

    $stmt = $conn->prepare(
        "UPDATE customer 
        SET Name = :Name,
            Birthdate = :Birthdate,
            Email = :Email,
            OutstandingDebt = :OutstandingDebt,
            CountryCode = :CountryCode
        WHERE CustomerID = :CustomerID"
    );

    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':Birthdate', $Birthdate);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':OutstandingDebt', $OutstandingDebt);
    $stmt->bindParam(':CountryCode', $CountryCode);
    $stmt->bindParam(':CustomerID', $CustomerID);

    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script>
        $(document).ready(function(){

            swal({
                title: "Success!",
                text: "Successfully update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
            }, function(){
                window.location.href = "index_stu.php";
            });

        });
        </script>
        ';
    }

    $conn = null;
}
?>

