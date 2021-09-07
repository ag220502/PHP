<?php
    $original_date = "2019-03-31";    
    // Creating timestamp
    $timestamp = strtotime($original_date);    
    // Creating new date
    $new_date = date("d-m-Y", $timestamp);
    echo "Original: ".$original_date."<br>";
    echo "New: ".$new_date;
?>