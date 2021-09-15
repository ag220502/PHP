<?php
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
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
            if($fileError==0)
            {
                $newFileName = uniqid('',true) . "." .$fileExt;
                $fileDes = "Uploads/".$newFileName;
                if(move_uploaded_file($filetmpName,$fileDes))
                {
                    echo "Successfully Uploaded";
                }
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
    <form action="Qn-11.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="newFile">
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>
<?php
    }
// ?>