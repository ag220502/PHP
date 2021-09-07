<?php
    $num = 5;
    $pro = 1;
    for ($i=$num; $i > 0; $i--) { 
        $pro *= $i;
    }
    echo "The factorial of ".$num." is ".$pro;
?>