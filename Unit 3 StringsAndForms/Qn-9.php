<?php
    $date1 = new DateTime('2020-05-10 02:12:51');
    $date2 = $date1->diff(new DateTime('2021-06-12 11:10:00'));
    echo $date2->days.' Total days'."<br>";
?>