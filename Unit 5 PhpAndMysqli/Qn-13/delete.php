<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed");
    }
    else {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM stu_details WHERE id=$id";
            $result = mysqli_query($conn,$sql);
            if($result) {
                header('Location: index.php');
            }
            else {
                echo "Student couldn't be deleted";
            }
        }
    }
?>