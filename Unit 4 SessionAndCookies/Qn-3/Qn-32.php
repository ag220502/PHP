<?php
//Create a PHP script that has one session variable called counter which increments its value as many times user visits the page.
    session_start();
    echo "SESSION Value of Color is ".$_SESSION['color']."<br><br>";
    echo "SESSION Value of Animal is ".$_SESSION['animal'];
?>