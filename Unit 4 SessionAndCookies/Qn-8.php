<?php
    $file = fopen("read.txt", "r");
    while(!feof($file)) 
    {
        echo fgets($file) . "<br>";
    }
    fclose($file);
?>