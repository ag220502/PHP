<?php
    $animals = array("Lion"=>130, "Giraffe"=>550, "Monkey"=>60, "Squirrel"=>30);
    $highest=0;
    $animal="";
    foreach ($animals as $name => $height) {
        if($height>$highest) {
            $highest=$height;
            $animal=$name;
        }
    }
    echo "The tallest animal is ".$animal;
?>