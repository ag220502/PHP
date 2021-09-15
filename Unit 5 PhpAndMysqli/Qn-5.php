<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="" method="post"> 
        Name: <input type="text" name="regname" id="regname"><br><br>
        Age: <input type="text" name="regage" id="regage"><br><br>
        City: <input type="text" name="regcity" id="regcity"><br><br>
        <button type="submit" name="rsub">Submit</button> <br><br>

        <table border=1 cellpadding="5px">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost","root","","test");
                if(!$conn) {
                    die("Connection Failed"); 
                }
                else {
                    if (isset($_POST['rsub'])) {
                        $regname = $_POST['regname'];
                        $regage = $_POST['regage'];
                        $regcity = $_POST['regcity'];
            
                        if (!empty($regname) && !empty($regage) && !empty($regcity)) {
                            $sql = "INSERT INTO students(`student_name`,`age`,`city`) VALUES ('$regname','$regage','$regcity')";
                            $result = mysqli_query($conn,$sql);
                            if($result) {
                                $sql2 = "SELECT * FROM students";
                                $result2 = mysqli_query($conn,$sql2);
                                if(mysqli_num_rows($result2) > 0) {
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        echo "<tr><td>{$row['student_name']}</td><td>{$row['age']}</td><td>{$row['city']}</td></tr>";
                                    }
                                }
                            }
                            else {
                                echo "Unable to Save Student";
                            }
                        }
                    }
                }
            ?>
        </table>
    </form>
</body>
</html>