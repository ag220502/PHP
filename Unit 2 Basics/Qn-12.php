<?php
    function isPrime($num) {
        for ($i=2; $i <= $num/2; $i++) { 
            if($num % $i == 0) {
                return $num." is not a prime number";
            }
        }
        return $num." is a prime number";
    }

    echo isPrime(21);
?>