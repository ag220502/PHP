<?php
    $sum = 0;
    for ($i=0; $i < 30; $i++) { 
        echo $i."  ";
        $sum += $i;
    }
    echo "<br>Sum: ".$sum;
?>