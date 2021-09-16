<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Update Details</h1>
    <form action="" method="post">
        <?php
            $conn = mysqli_connect("localhost","root","","test");
            if(!$conn) {
                die("Connection Failed");
            }
            else {
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM order_detail WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    if($row = mysqli_fetch_assoc($result)) {
                        echo "Order No.: <input type='text' name='onum' id='onum' value='{$row["order_num"]}'><br><br>
                            Name: <input type='text' name='oname' id='oname' value='{$row["name"]}'><br><br>
                            Quantity: <input type='text' name='oqty' id='oqty' value='{$row["qty"]}'><br><br>";
                    }
                    else {
                        "No Records Found";
                    }
                }
            }
        ?>
        <button type="submit" name="updateorder">Update</button>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed");
    }
    else {
        if(isset($_POST['updateorder'])) {
            $ordernum = $_POST['onum'];
            $name = $_POST['oname'];
            $qty = $_POST['oqty'];

            $sql = "UPDATE order_detail SET order_num='$ordernum',name='$name',qty='$qty' WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            if($result) {
                header('Location: Qn-8.php');
            }
            else {
                echo "Sorry data was not updated";
            }
        }
    }
?>
