<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Student Form</h1>
    <form action="" method="post">
        Name: <input type="text" name="stuname" id="stuname"><br><br>
        Age: <input type="text" name="stuage" id="stuage"><br><br>
        City: <input type="text" name="stucity" id="stucity"><br><br>
        <button type="submit" name="stusub">Submit</button> <br><br>
    </form>
</body>
</html>

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
        if (isset($_POST['stusub'])) {
            $stuname = $_POST['stuname'];
            $stuage = $_POST['stuage'];
            $stucity = $_POST['stucity'];

            if (!empty($stuname) && !empty($stuage) && !empty($stucity)) {
                $sql = "INSERT INTO students(`student_name`,`age`,`city`) VALUES ('$stuname','$stuage','$stucity')";
                $result = mysqli_query($conn,$sql);
                if($result) {
                    echo "Student Saved Successfully";
                }
                else {
                    echo "Unable to Save Student";
                }
            }
        }
    }
?>