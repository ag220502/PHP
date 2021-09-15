<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $allowed = array('png','jpg','jpeg','svg');
        $file = $_FILES['newFile'];
        if(isset($_FILES['newFile']))
        {
            $newfile = $_FILES['newFile'];
            $fileName = $_FILES['newFile']['name'];
            $filetmpName = $_FILES['newFile']['tmp_name'];
            $fileSize = $_FILES['newFile']['size'];
            $fileError = $_FILES['newFile']['error'];
            $fileType = $_FILES['newFile']['type'];
            $fileExtExplode = explode(".",$fileName);
            $fileExt = strtolower(end($fileExtExplode));
            if(in_array($fileExt,$allowed))
            {
                if($fileError==0)
                {
                    $newFileName = uniqid('',true) . "." .$fileExt;
                    $fileDes = "Uploads/".$newFileName;
                    if(move_uploaded_file($filetmpName,$fileDes))
                    {
                        echo "Successfully Uploaded";
                    }
                    else
                    {
                        echo "Error In Uploading File";
                    }
                }
            }
            else
            {
                echo "Please Upload Only Image";
            }
        }
    }
    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Qn-5.php" method="POST" enctype="multipart/form-data">
        <label>Please Upload An Image</label><br>
        <input type="file" name="newFile"><br><br><br>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>
<?php
    }
?>