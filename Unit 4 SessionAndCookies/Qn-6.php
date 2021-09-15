<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['login']))
    {
        $name= $_POST['username'];
        $pass= $_POST['pass'];
        if($name=="admin" && $pass="admin")
        {
            session_start();
            $_SESSION['UserName']=$name;
            echo "<script>alert('Session Started');</script>";
            echo "Hello ".$_SESSION['UserName'];
            echo '
            <form action="Qn-6.php" method="POST">
                <input type="submit" value="LOG OUT" name="logout">
            </form>';
        }
    }
    else if(isset($_POST['logout']))
    {
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Session Closed...Loging Outt');</script>";
        echo "<script>window.location='Qn-6.php';</script>";
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
    <form action="Qn-6.php" method="POST">
        <label for="">Please Enter Username : </label>
        <input type="text" name="username">
        <label for="">Please Enter Password : </label>
        <input type="password" name="pass">
        <input type="submit" value="SUBMIT" name="login">
    </form>
</body>
</html>
<?php
}
?>