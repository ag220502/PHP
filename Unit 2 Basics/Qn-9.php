<?php
    function find_factorial($num) {
        if($num>0) {
            $pro = 1;
            for ($i=$num; $i > 0; $i--) { 
                $pro *= $i;
            }
            echo "The factorial of ".$num." is ".$pro;
        }
        else {
            echo "Enter number greater than 0";
        }
    }

    find_factorial(10);
?>