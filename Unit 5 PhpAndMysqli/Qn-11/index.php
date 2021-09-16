<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Student Details</h1>
    <table border=1 cellpadding="5px">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost","root","","test");

            if(!$conn) {
                die("Connection Failed"); 
            }
            else {
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>{$row['student_name']}</td><td>{$row['age']}</td><td>{$row['city']}</td><td><a href='edit.php?id={$row["id"]}'><button name='editbtn'>Edit</button></td><td><a href='delete.php?id={$row["id"]}'><button name='deletebtn'>Delete</button></td></tr>";
                    }
                }
                else {
                    "No Records Found";
                }
            }
        ?>
    </table>
</body>
</html>