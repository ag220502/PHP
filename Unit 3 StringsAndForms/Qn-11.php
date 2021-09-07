<?php
    $curr_day = time();
    echo $curr_day."<br>";
    $days = (int)($curr_day/86400);
    $hours = (int)(($curr_day%86400) / 3600);
    $mins = (int)((($curr_day%86400) % 60) / 60);
    $sec = (int)(((($curr_day%86400) % 60) % 60));
    echo "Days: $days"."<br>";
    echo "Hours: $hours"."<br>";
    echo "Mins: $mins"."<br>";
    echo "Sec: $sec";
?>