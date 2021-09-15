<!DOCTYPE html>
<?php
    $cookie_name = "user";
    $cookie_value = "Sanaaa";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html lang="en">
<head>
    <title>Unit 4</title>
</head>
<body>
    <?php
        if(!isset($_COOKIE[$cookie_name])) {
            echo "Cookie named {$cookie_name} is not set!";
        } 
        else {
            echo "Cookie {$cookie_name} is set!<br>";
            echo "Value is: ".$_COOKIE[$cookie_name];
        }
    ?>
</body>
</html>