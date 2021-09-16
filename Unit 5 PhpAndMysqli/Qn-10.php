<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Cuisine</h1>
    <form action="" method="post">
        Name: <input type="text" name="cusname" id="cusname"><br><br>
        Choose Your Cuisine: <br> 
            <input type="radio" name="food" id="Punjabi" value="Punjabi"><label for="Punjabi">Punjabi</label> <br>
            <input type="radio" name="food" id="Chinese" value="Chinese"><label for="Chinese">Chinese</label> <br>
            <input type="radio" name="food" id="Italian" value="Italian"><label for="Italian">Italian</label> <br>
            <input type="radio" name="food" id="Mexican" value="Mexican"><label for="Mexican">Mexican</label> <br> <br>
        <button type="submit" name="cuisinesub">Submit</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['cuisinesub'])) {
            $name = $_POST['cusname'];
            $cuisine = $_POST['food'];
            
            $sql = "INSERT INTO cuisine(`name`,`cuisine`) VALUES ('$name','$cuisine')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                echo "Cuisine added successfully";
            }
            else {
                echo "Unable to add cuisine";
            }
        }
    }
?>