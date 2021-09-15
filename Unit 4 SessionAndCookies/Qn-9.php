<?php
    $file = fopen("WriteFile.txt", "a");
    echo "New File Created"."<br>";
    fwrite($file, "\nThis is new data in file");
    echo "Data Written to file";
    fclose($file);
?>