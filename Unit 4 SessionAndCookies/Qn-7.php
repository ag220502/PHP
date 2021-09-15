<?php
    $file = fopen("WriteFile.txt", "w");
    echo "New File Created"."<br>";
    fwrite($file, "Hello\nHow Are you??");
    echo "Data Written to file";
    fclose($file);
?>