<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="" method="POST">
        User id*: <input type="text" name="uid" id="uid"> 
        Password*: <input type="password" name="upass" id="upass"> <br><br>
        Name*: <input type="text" name="uname" id="uname"> 
        Address: <input type="text" name="address" id="address"> <br><br>
        Country*: <select name="country" id="country">
            <option value="India">India</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Nepal">Nepal</option>
            <option value="Srilanka">Srilanka</option>
        </select> <br><br>
        ZIP Code*: <input type="text" name="zcode" id="zcode">
        Email*: <input type="email" name="mailid" id="mailid"> <br><br>
        Sex*: <input type="radio" name="sex" id="male" value="Male"> <label for="male">Male</label>
            <input type="radio" name="sex" id="female" value="Female"> <label for="female">Female</label> <br><br>
        Language*: <input type="radio" name="lang" id="eng" value="English"> <label for="eng">English</label>
                <input type="radio" name="lang" id="noneng" value="Non-English"> <label for="noneng">Non-English</label> <br><br>
        About: <br> <textarea name="abt" id="abt" cols="30" rows="6"></textarea><br><br>

        <button type="submit" name="fsubmit">Submit</button> <br><br>
    </form>
</body>
</html>

<?php
    if(isset($_POST['fsubmit'])) {
        $uid = $_POST['uid'];
        $pass = $_POST['upass'];
        $name = $_POST['uname'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $zcode = $_POST['zcode'];
        $email = $_POST['mailid'];
        $sex = $_POST['sex'];
        $lang = $_POST['lang'];
        $about = $_POST['abt'];
        
        if(!empty($uid) && !empty($pass) && !empty($name) && !empty($country) && !empty($zcode) && !empty($email) && !empty($sex) && !empty($lang)) {
            if ((strlen($uid)>5 && strlen($uid)<12) && (strlen($pass)>7 && strlen($pass)<12)) {
                if (ctype_alpha($name)) {
                    if(ctype_digit($zcode)) {
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Registration Successful!";
                        }
                        else {
                            echo "Enter valid email";
                        }
                    }
                    else {
                        echo "Enter valid zip-code";
                    }
                } 
                else {
                    echo "Please enter valid name";
                }                
            }
            else {
                echo "Please ensure User Id is of length 5-12 <br>And password is of length 7-12";
            }
        }
        else {
            echo "Please fill in all fields";
        }
    }
?>