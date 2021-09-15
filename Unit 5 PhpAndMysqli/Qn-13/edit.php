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
                    $sql = "SELECT * FROM stu_details WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    if($row = mysqli_fetch_assoc($result)) {
                        $gender = $row['gender'];
                        $food = $row['food'];
                        $edu = $row['education'];
                    }
                    else {
                        "No Records Found";
                    }
                }
            }
        ?>
        First Name: <input type="text" name="firstname" id="firstname" value='<?php echo $row["firstname"] ?>'><br><br>
        Last Name: <input type="text" name="lastname" id="lastname" value='<?php echo $row["lastname"] ?>'><br><br>
        Gender: <input type="radio" name="gender" id="male" value="Male" <?php echo ($gender=='Male')?'checked':'' ?> ><label>Male</label>
                <input type="radio" name="gender" id="female" value="Female" <?php echo ($gender=='Female')?'checked':'' ?> ><label>Female</label><br><br>
        Favourite Food: <br><input type="checkbox" name="stufood" id="steak" value="Steak" <?php echo ($food=='Steak')?'checked':'' ?>><label for="steak">Steak</label><br>
                            <input type="checkbox" name="stufood" id="pizza" value="Pizza" <?php echo ($food=='Pizza')?'checked':'' ?>><label for="pizza">Pizza</label><br>
                            <input type="checkbox" name="stufood" id="chicken" value="Chicken" <?php echo ($food=='Chicken')?'checked':'' ?>><label for="chicken">Chicken</label><br><br>
        <textarea name="quote" id="quote" cols="30" rows="6"><?php echo $row["quote"] ?></textarea><br><br>
        Select Level of Education: <select name="education" id="education">
                                        <option value="Jr.High" <?php echo ($edu=='Jr.High')?'selected':'' ?>>Jr.High</option>
                                        <option value="Sr.High" <?php echo ($edu=='Sr.High')?'selected':'' ?>>Sr.High</option>
                                        <option value="Graduate" <?php echo ($edu=='Graduate')?'selected':'' ?>>Graduate</option>
                                        <option value="Postgraduate" <?php echo ($edu=='Postgraduate')?'selected':'' ?>>Postgraduate</option>
                                    </select><br><br>
        
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed");
    }
    else {
        if(isset($_POST['update'])) {
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $food = $_POST['stufood'];
            $quote = $_POST['quote'];
            $education = $_POST['education'];

            $sql = "UPDATE stu_details SET firstname='$fname',lastname='$lname',gender='$gender',food='$food',quote='$quote',education='$education' WHERE id=$id";
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
