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
                    $sql = "SELECT * FROM students WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    if($row = mysqli_fetch_assoc($result)) {
                        echo "Name: <input type='text' name='upname' id='upname' value='{$row["student_name"]}'><br><br>
                            Age: <input type='text' name='upage' id='upage' value='{$row["age"]}'><br><br>
                            City: <input type='text' name='upcity' id='upcity' value='{$row["city"]}'><br><br>";
                    }
                    else {
                        "No Records Found";
                    }
                }
            }
        ?>
        <button type="submit" name="updatebtn">Update</button>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed");
    }
    else {
        if(isset($_POST['updatebtn'])) {
            $name = $_POST['upname'];
            $age = $_POST['upage'];
            $city = $_POST['upcity'];

            $sql = "UPDATE students SET student_name='$name',age='$age',city='$city' WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            if($result) {
                header('Location: index.php');
            }
            else {
                echo "Sorry data was not updated";
            }
        }
    }
?>
