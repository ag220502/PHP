<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Car Details</h1>
    <form action="" method="post">
        Model No.: <input type="text" name="carnum" id="carnum"><br><br>
        Price: <input type="text" name="carprice" id="carprice"><br><br>
        Company: <input type="text" name="company" id="company"><br><br>
        <button type="submit" name="carsub">Submit</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['carsub'])) {
            $model = $_POST['carnum'];
            $price = $_POST['carprice'];
            $company = $_POST['company'];
            
            $sql = "INSERT INTO car(`model`,`price`,`company`) VALUES ('$model','$price','$company')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                echo "Car details saved successfully";
            }
            else {
                echo "Unable to save car details";
            }
        }
    }
?>