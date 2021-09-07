<?php
    $birth_day = mktime(0,0,0,9,20,2021);  // modify the birth day 12/31/2013
    $curr_day = time();;
    $diff = ($birth_day - $curr_day);
    $days = (int)($diff/86400);
    echo "Days till birthday: $days days!"."<br>";
?>