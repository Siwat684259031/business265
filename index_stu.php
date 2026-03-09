<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>67 CRUD Customer Information 67</title>
</head>

<body>

 <?php
require "connect.php";
 ?> 

<div class="container">
    <div class="row">
        <div class="col-md-12"> <br>

            <h3>รายชื่อลูกค้า 
                <a href="addcustomer_dropdownfull_swapinsert.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a>
            </h3>

            <table class="table table-striped table-hover table-responsive table-bordered">

                <thead align="center">
                    <tr>
                        <th width="10%">รหัสลูกค้า</th>
                        <th width="20%">ชื่อ-นามสกุล</th>
                        <th width="20%">ประเทศ</th>
                        <th width="10%">ยอดหนี้</th>
                        <th width="5%">แก้ไข</th>
                        <th width="5%">ลบ</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                        //https://pad.riseup.net/p/np-db-keep
 
                        $sql =   "SELECT customer.CustomerID, customer.Name, country.CountryName, customer.OutstandingDebt
                        FROM customer
                        JOIN country ON customer.CountryCode = country.CountryCode";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { 
                        ?>

                    <tr>

                        <td><?= htmlspecialchars($r['CustomerID']) ?></td>
                        <td><?= htmlspecialchars($r['Name']) ?></td>
                        <td><?= htmlspecialchars($r['CountryName']) ?></td>
                        <td><?= htmlspecialchars($r['OutstandingDebt']) ?></td>

                        <td>
                            <a href="updateCustomerForm_stu.php?CustomerID=<?= urlencode($r['CustomerID']) ?>"
                            class="btn btn-warning btn-sm">
                            แก้ไข
                            </a>
                        </td>

                        <td>
                            <a href="deleteCustomer.php?CustomerID=<?= urlencode($r['CustomerID']) ?>" 
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('ยืนยันการลบข้อมูล !!');">
                            ลบ
                            </a>
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>
    </div>
</div>

</body>
</html>