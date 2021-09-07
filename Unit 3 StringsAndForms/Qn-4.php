<?php
    $names = array("Salary of Mr. A"=>1000,"Salary of Mr. B"=>1200,"Salary of Mr. C"=>1400);
    $output = "<table border=1>";
    foreach ($names as $name => $salary) {
        $output .= "<tr><td>{$name}</td><td>{$salary}</td></tr>";
    }
    $output .= "</table>";
    echo $output;
?>