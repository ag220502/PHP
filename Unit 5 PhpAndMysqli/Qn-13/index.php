<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Student Form</h1>
    <form action="" method="post">
        First Name: <input type="text" name="firstname" id="firstname"><br><br>
        Last Name: <input type="text" name="lastname" id="lastname"><br><br>
        Gender: <input type="radio" name="gender" id="male" value="Male"><label>Male</label>
                <input type="radio" name="gender" id="female" value="Female"><label>Female</label><br><br>
        Favourite Food: <br><input type="checkbox" name="stufood" id="steak" value="Steak"><label for="steak">Steak</label><br>
                            <input type="checkbox" name="stufood" id="pizza" value="Pizza"><label for="pizza">Pizza</label><br>
                            <input type="checkbox" name="stufood" id="chicken" value="Chicken"><label for="chicken">Chicken</label><br><br>
        <textarea name="quote" id="quote" cols="30" rows="6" placeholder="Enter your favourite quote!"></textarea><br><br>
        Select Level of Education: <select name="education" id="education">
                                        <option value="Jr.High">Jr.High</option>
                                        <option value="Sr.High">Sr.High</option>
                                        <option value="Graduate">Graduate</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                    </select><br><br>
        <button type="submit" name="studentform">Submit</button><br>
    </form>
    <?php
        $conn = mysqli_connect("localhost","root","","test");

        if(!$conn) {
            die("Connection Failed"); 
        }
        else {
            if(isset($_POST['studentform'])) {
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $gender = $_POST['gender'];
                $food = $_POST['stufood'];
                $quote = $_POST['quote'];
                $education = $_POST['education'];

                $sql = "INSERT INTO stu_details(`firstname`,`lastname`,`gender`,`food`,`quote`,`education`) VALUES ('$fname','$lname','$gender','$food','$quote','$education')";
                $result = mysqli_query($conn,$sql);
                if($result) {
                    echo "Details added successfully";
                }
                else {
                    // echo "Unable to add details";
                    echo $mysqli -> error;
                }
            }
        }
    ?>

    <h1>Student Details</h1>
    <table border=1 cellpadding="5px">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
            <th>Food</th>
            <th>Quote</th>
            <th>Education</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $conn = mysqli_connect("localhost","root","","test");

            if(!$conn) {
                die("Connection Failed"); 
            }
            else {
                $sql = "SELECT * FROM stu_details";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>{$row['firstname']}</td><td>{$row['lastname']}</td><td>{$row['gender']}</td><td>{$row['food']}</td><td>{$row['quote']}</td><td>{$row['education']}</td><td><a href='edit.php?id={$row["id"]}'><button name='editbtn'>Edit</button></td><td><a href='delete.php?id={$row["id"]}'><button name='deletebtn'>Delete</button></td></tr>";
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