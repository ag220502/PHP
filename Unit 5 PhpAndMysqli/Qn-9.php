<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="" method="post">
        Name: <input type="text" name="coname" id="coname"><br><br>
        Email Id: <input type="email" name="comail" id="comail"><br><br>
        Message: <br> <textarea name="conmsg" id="conmsg" cols="30" rows="6"></textarea><br><br>
        <button type="submit" name="consub">Submit</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['consub'])) {
            $name = $_POST['coname'];
            $mail = $_POST['comail'];
            $msg = $_POST['conmsg'];
            
            $sql = "INSERT INTO contactus(`name`,`email`,`message`) VALUES ('$name','$mail','$msg')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                echo "Contact added successfully";
            }
            else {
                echo "Unable to add contact ";
            }
        }
    }
?>