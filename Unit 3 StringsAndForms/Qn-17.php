<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 3</title>
</head>
<body>
    <h1>Travel Reservation</h1>
    <form action="" method="POST">
        Full Name*: <input type="text" name="tname" id="tname"> <br><br>
        Email Address*: <input type="email" name="temail" id="temail"> <br><br>
        Select Tour Package*: <select name="pack" id="pack">
                                <option value="Adventure">Adventure</option>
                                <option value="Wildlife">Wildlife</option>
                                <option value="Medical">Medical</option>
                                <option value="Pilgrimage">Pilgrimage</option>
                            </select> <br><br>
        Arrival Date*: <input type="date" name="tdate" id="tdate"> <br><br>
        Number of Persons*: <input type="text" name="pnum" id="pnum"> <br><br>
        What would you want to avail*: <input type="radio" name="avail" id="coupon" value="Coupon"><label for="coupon">Coupon</label>
                                    <input type="radio" name="avail" id="discount" value="Discount"><label for="discount">Discount</label> <br><br>
        <input type="checkbox" name="tc" id="tc" checked> Terms and Conditions <br><br>

        <button type="submit" name="tsubmit">Submit</button> <br><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['tsubmit'])) {
        $fname = $_POST['tname'];
        $email = $_POST['temail'];
        $pack = $_POST['pack'];
        $adate = $_POST['tdate'];
        $pnum = $_POST['pnum'];
        $avail = $_POST['avail'];
        $tc = $_POST['tc'];

        if(!empty($fname) && !empty($email) && !empty($pack) && !empty($adate) && !empty($pnum) && !empty($avail) && !empty($tc)) {
            if (ctype_alpha($fname)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if(ctype_digit($pnum)) {
                        echo "Registration Successful!";
                    }
                    else {
                        echo "Enter valid number";
                    }
                }
                else {
                    echo "Enter valid email";
                }
            }
            else {
                echo "Please enter valid name";
            } 
        }
        else {
            echo "Please fill in all fields";
        }
    }
?>