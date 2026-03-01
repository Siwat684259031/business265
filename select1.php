<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูข้อมูลselect0.php</title>
</head>
<body>

<?php
require 'connect.php';

// ทดสอบเรียกดูข้อมูลจากฐานข้อมูล แบบ Loop
$sql = 'SELECT * FROM customer';
$stmt = $conn->prepare($sql);
$stmt->execute();
echo '<br/>';
$result = $stmt->fetchAll();
//print_r($result);

foreach ($result as $r) {
    switch ($r['CountryCode']) {
        case 'TH':
            $countryName = 'ไทย';
            break;
        case 'PK':
            $countryName = 'ปากีสถาน';
            break;
        case 'BD':
            $countryName = 'บังกลาเทศ';
            break;
        case 'AT':
            $countryName = 'ออสเตรีย';
            break;
        default:
            $countryName = $r['CountryCode'];
    }

    echo $r['CustomerID'] . '--' 
       . $r['Name'] . '--' 
       . $r['OutstandingDebt'] . '--' 
       . $countryName . "<br>";
}
?>
