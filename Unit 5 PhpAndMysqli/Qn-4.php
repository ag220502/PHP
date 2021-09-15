<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 5</title>
</head>
<body>
    <h1>Upload Image</h1>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br><br>  
        <button type="submit" name="upload">UPLOAD</button><br><br>
    </form>
</body>
</html>

<?php
    $conn = mysqli_connect("localhost","root","","test");
    if(!$conn) {
        die("Connection Failed"); 
    }
    else {
        if (isset($_POST['upload'])) {  
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];    
            $folder = "images/".$filename; 
            // $filepath = "images/" . $_FILES["uploadfile"]["name"];

            $sql = "INSERT INTO images (filename) VALUES ('$filename')";
            $result = mysqli_query($conn, $sql);
             
            if (move_uploaded_file($tempname, $folder))  {
                echo "Image uploaded succesfully<br>";
            }else{
                echo "Failed to upload image";
            }
        }

        $result = mysqli_query($conn, "SELECT * FROM images");
        while($data = mysqli_fetch_array($result)) {
            echo "<img src='images/".$data["filename"]."' height=200 width=300 />";
        }
    }
?>