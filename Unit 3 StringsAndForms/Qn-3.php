<?php
    $email = "sana@gmail.com";
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        echo '"' . $email . '" => is Valid';
    }
    else 
    {
        echo '"' . $email . '" => is not Invalid';
    }
?>