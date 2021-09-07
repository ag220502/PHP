<?php
    $date = date_create("2016-09-01");
    echo date_format($date,"Y/m/d")."<br>";
    echo date_format($date,"y.m.d")."<br>";
    echo date_format($date,"d-m-y");
?>