<?php
    $file="file.txt";
    $linecount = 0;
    $handle = fopen($file, "r");
    while(!feof($handle)){
      $line = fgets($handle);
      $linecount++;
    }
    
    fclose($handle);
    
    echo $linecount;
?>