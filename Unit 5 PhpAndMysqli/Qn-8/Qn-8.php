<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Orders</h1>
    <table border=1 cellpadding="5px">
        <tr>
            <th>Order Number</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Edit</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost","root","","test");

            if(!$conn) {
                die("Connection Failed"); 
            }
            else {
                $sql = "SELECT * FROM order_detail";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>{$row['order_num']}</td><td>{$row['name']}</td><td>{$row['qty']}</td><td><a href='edit.php?id={$row["id"]}'><button name='editbtn'>Edit</button></td></tr>";
                    }
                }
                else {
                    "No Records Found";
                }
            }
        ?>
    </table>
    <h2>Form</h2>
    <form action="" method="post">
        Order No.: <input type="text" name="onum" id="onum"><br><br>
        Name: <input type="text" name="oname" id="oname"><br><br>
        Quantity: <input type="text" name="oqty" id="oqty"><br><br>
        <button type="submit" name="ordersub">Submit</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['ordersub'])) {
            $ordernum = $_POST['onum'];
            $name = $_POST['oname'];
            $qty = $_POST['oqty'];
            
            $sql = "INSERT INTO order_detail(`order_num`,`name`,`qty`) VALUES ('$ordernum','$name','$qty')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                echo "Order details saved successfully";
            }
            else {
                echo "Unable to save order details";
            }
        }
    }
?>