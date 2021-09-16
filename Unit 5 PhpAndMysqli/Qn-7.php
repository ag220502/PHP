<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Feedback</h1>
    <form action="" method="post">
        Username <input type="text" name="fuser" id="fuser"><br><br>
        Comments: <br> <textarea name="fcomment" id="fcomment" cols="30" rows="6"></textarea><br><br>
        <button type="submit" name="fsub">Submit</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['fsub'])) {
            $username = $_POST['fuser'];
            $comment = $_POST['fcomment'];
            
            $sql = "INSERT INTO feedback(`username`,`comment`) VALUES ('$username','$comment')";
            $result = mysqli_query($conn,$sql);
            if($result) {
                echo "Comment added successfully";
            }
            else {
                echo "Unable to add comment";
            }
        }
    }
?>