<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 3</title>
</head>
<body>
    <h2>Input Validation</h2>
    <form action="" method="post">
        Username: <input type="text" name="user" id="user"> <br><br>
        Password: <input type="password" name="userpass" id="userpass"> <br><br>
        <button type="submit" name="usersub">Submit</button> <br><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['usersub'])) {
        // echo "Done";
        $username = $_POST['user'];
        $pass = $_POST['userpass'];

        if (!empty($username) && !empty($pass)) {
            if(strlen($pass)>7 && strlen($pass)<16) {
                if (preg_match('/[A-Z]/', $pass)) {
                    if (preg_match('/[a-z]/', $pass)) {
                        if (preg_match('/\d/', $pass)) {
                            echo "Success";
                        }
                        else {
                            echo "The Password must include atleast 1 digit";
                        }
                    }
                    else {
                        echo "The Password must include atleast 1 Lowercase letter";
                    }
                }
                else {
                    echo "The Password must include atleast 1 Uppercase letter";
                }
            }
            else {
                echo "Please ensure Password is of length 7-16";
            }
        }
        else {
            echo "Please fill in all fields";
        }
    }
?>