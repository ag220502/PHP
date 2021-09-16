<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "test";

    $conn = mysqli_connect($host,$user,$password,$database);

    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        $sql = "SELECT * FROM students";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['student_name']."<br>";
            }
        }
        else {
            "No Records Found";
        }
    }
?>